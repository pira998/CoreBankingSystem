<?php

class Loans extends Controller {
    public function __construct() {
        $this->loanModel = $this->model( 'Loan' );
        $this->loanRequestModel = $this->model( 'LoanRequest' );
    }

    public function index() {
        $loans = $this->loanModel->findAllLoans();
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        }
        $data = [
            'title' => 'loans page',
            'loans' => $loans
        ];
        $this->view( 'employee/loans/index', $data );

    }

    public function create() {

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

            $data = [
                'account_number' => trim( $_POST['account_number'] ),
                'saving_account_number' => trim( $_POST['saving_account_number'] ),
                'amount' => trim( $_POST['amount'] ),
                'duration' => trim( $_POST['duration'] ),
                'interest_rate' => trim( $_POST['interest_rate'] ),
                'loan_type' => trim( $_POST['loan_type'] ),

            ];

            if ( $this->loanModel->addLoan( $data ) ) {
                $loanId = $this->loanModel->getLoanId();
                if ( $data['loan_type'] === '1' ) {
                    if ( $this->loanModel->addPersonalLoan( $loanId ) ) {
                        $this->loanRequestModel->addLoanRequest( $loanId );
                        $this->index();
                    }else{
                        die('Adding personal loan is failed, please try again');
                    }
                    ;
                } else {
                    if($this->loanModel->addBusinessLoan( $loanId )){
                        $this->loanRequestModel->addLoanRequest( $loanId  );
                        $this->index();
                    }
                    else{
                        die('Adding Business loan is failed, please try again');
                    }
                }

            } else {
                die( 'Something went wrong, please try again!' );
            }

        }
    }
}