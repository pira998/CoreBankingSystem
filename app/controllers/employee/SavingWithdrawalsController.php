<?php

class SavingWithdrawals extends Controller {
    public function __construct() {
        $this->withdrawModel = $this->model( 'Withdraw' );
        $this->accountModel = $this->model( 'Account' );
    }

    public function index() {
        $info = $this->withdrawModel->getAllSavingWithdrawsInfo();
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        }
        $data = [
            'title' => 'saving withdraws page',
            'saving_withdraws' => $info
        ];
        $this->view( 'employee/withdrawals/Saving', $data );

    }

    public function create() {
        $data = [
            'account_number'=>'',
            'saving_account_number'=>'',
            'amount'=> '',

        ];

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

            $data = [
                'account_number' => trim( $_POST['account_number'] ),
                'saving_account_number' => trim( $_POST['saving_account_number'] ),
                'amount' => trim( $_POST['amount'] ),

            ];
            $account = $this->accountModel->checkSavingAccountByAccNo( $data['saving_account_number'], $data['account_number'] );
            if ( $account ) {
                if ($this->accountModel->checkSavingAccountBalance( $data ) ) {
                    if ( $this->withdrawModel->addWithdraw( $data ) ) {
                        $withdrawId = $this->withdrawModel->getWithdrawCount();
                        if ( $this->withdrawModel->addSavingWithdraw( $withdrawId, $data ) ) {
                            $this->accountModel->savingWithdraw( $data );
                            $this->index();
                        } else {
                            die( 'Something went wrong, please try again!' );
                        }
                    } else {
                        die( 'Something went wrong, please try again!' );
                    }
                } else {
                    die( 'Account have not enough money or withdraw count reached its limit, please try again!' );
                }

            } else {
                die( 'There are no account in this account number, please try again!' );

            }

        }

    }

}