<?php

class Customers extends Controller {
    public function __construct() {
        $this->customerModel = $this->model( 'Customer' );
    }

    public function index() {
        $customers = $this->customerModel->findAllCustomers();
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        }
        $data = [
            'title' => 'customers page',
            'customers' => $customers
        ];

        $this->view( 'employee/customers/index', $data );
    }

    public function create() {
        $data = [
            'customer_id' => '',
            'name' => '',
            'age' => '',
            'address' => '',
            'phone_number' => '',
            'nic' => '',

        ];

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

            $data = [

                'name' => trim( $_POST['name'] ),
                'dob' => trim( $_POST['dob'] ),
                'address' => trim( $_POST['address'] ),
                'phone_number' => trim( $_POST['phone_number'] ),
                'nic' => trim( $_POST['nic'] ),

            ];
            // $data['password'] = password_hash( $data['password'], PASSWORD_DEFAULT );

            if ( $this->customerModel->addCustomer( $data ) ) {
                if ( trim( $_POST['type'] === '1' ) ) {
                    $info = $this->customerModel->getCustomerID( $data );
                    $data['customer_id'] = $info->customer_id;

                    $this->customerModel->addIndividualCustomer( $data );
                }

                $this->index();
            } else {
                die( 'Something went wrong, please try again!' );
            }

        }

    }

    public function update( $id ) {
        $isIndividualCustomer = $this->customerModel->isIndividualCustomer( $id );
        if ( $isIndividualCustomer ) {
            $info = $this->customerModel->getIndividualCustomerInfo( $id );
        } else {
            $info = $this->customerModel->getOrganizationalCustomerInfo( $id );
        }

        $data = [
            'info' => $info,
            'isIndividualCustomer'=> $isIndividualCustomer

        ];

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $isIndividualCustomer = $this->customerModel->isIndividualCustomer( $id );
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

            $data = [
                'info' => $info,
                'phone_number'=> ( $_POST['phone_number'] ),
                'address'=> ( $_POST['address'] ),
                'customer_id' => $id,

            ];

            if ( $this->customerModel->updateProfile( $data ) ) {
                if ( $isIndividualCustomer ) {
                    $info = $this->customerModel->getIndividualCustomerInfo( $id );
                } else {
                    $info = $this->customerModel->getOrganizationalCustomerInfo( $id );
                }
                $data = [
                    'info' => $info,
                    'isIndividualCustomer'=> $isIndividualCustomer,
                    


                ];
           
                $this->view( 'employee/customers/update', $data );

            } else {
                die( 'Something went wrong, please try again!' );
            }
        }

        $this->view( 'employee/customers/update', $data );
        ;

    }

    public function delete( $id ) {
        $isIndividualCustomer = $this->customerModel->isIndividualCustomer( $id );
        if ( $isIndividualCustomer ) {
            $this->customerModel->deleteIndividualCustomer( $id );
        } else {
            $this->customerModel->deleteOrganizationalCustomerInfo( $id );
        }
        if ( $this->customerModel->deleteCustomerById( $id ) ) {
            $this->index();
        } else {
            die( 'Something went wrong!' );
        }

    }

}
