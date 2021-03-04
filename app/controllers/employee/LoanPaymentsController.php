<?php

class LoanPayments extends Controller {
    public function __construct() {
        $this->depositModel = $this->model( 'Deposit' );
        $this->loanModel = $this->model( 'Loan' );
       
    }

    public function index() {
        $loanPayments = $this->depositModel->findAllLoanPayments();
        // if ( !isLoggedIn() ) {
        //     header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        // }
        $data = [
            'title' => 'loans page',
            'loan_payments' => $loanPayments
        ];
        $this->view( 'employee/deposits/loanPayments', $data );

    }
    public function create(){
        $data = [
                    'loan_id'=>'',
              
                    'amount'=> '',
                   
                    
                    
                ];

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    $data = [
                        'loan_id' => trim($_POST['loan_id']),
                        'amount' => trim($_POST['amount']),
                     
                    
                    ];
                    if($this->depositModel->addLoanPaymentEntry($data)){
                       if($this->loanModel->updateLoanPayment($data)){
                        $this->index();

                       }else{
                        die("Loan payment is not updated, please try again!");

                       }

                    }else{
                        die("There are no loan id you entered, please try again!");

                    }
                    
                    
                    
                }

    }

    }
