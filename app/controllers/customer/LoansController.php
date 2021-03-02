<?php

class Loans extends Controller {
    public function __construct() {
        $this->loanModel = $this->model( 'Loan' );
        $this->fixedDepositModel = $this->model( 'FixedDeposit' );
        $this->depositModel = $this->model( 'Deposit' );
        $this->accountModel = $this->model( 'Account' );
    }

    public function index( $id ) {
        $loans = $this->loanModel->findAllLoansById($id);
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/customer/profile/login' );
        }
        $data = [
            'title' => 'loans page',
            'loans' => $loans
        ];
        $this->view( 'customer/loans/index', $data );

    }

    public function create() {

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

            $data = [
                'account_number' => trim( $_POST['account_number'] ),
                'saving_account_number' => trim( $_POST['saving_account_number'] ),
                'fixed_deposit_id' => trim( $_POST['fixed_deposit_id'] ),
                'amount' => trim( $_POST['amount'] ),
                'duration' => trim( $_POST['duration'] ),
                'interest_rate' => trim( $_POST['interest_rate'] ),
                'loan_type' => trim( $_POST['loan_type'] ),

            ];

            if ( $this->fixedDepositModel->checkFixedDeposit( $data['fixed_deposit_id'] ) ) {
                $result = $this->fixedDepositModel->checkLoanAmountValidity( $data['amount'], $data['fixed_deposit_id'] );
               
                if ((int)$result[0]['result'] ) {
                      if ( $this->loanModel->addLoan( $data ) ) {
                $loanId = $this->loanModel->getLoanId();
                if ( $data['loan_type'] === '1' ) {
                    if ( $this->loanModel->addPersonalLoan( $loanId ) ) {

                        if ( $this->accountModel->checkSavingAccountByAccNo( $data['saving_account_number'], $data['account_number'] ) ) {
                            if ( $this->depositModel->addDeposit( $data ) ) {
                                $depositId = $this->depositModel->getDepositCount();
                                if ( $this->depositModel->addSavingDeposit( $depositId, $data ) ) {
                                    $this->accountModel->savingDeposit( $data );
                                    $this->index( $_SESSION['customer_id'] );
                                } else {
                                    die( 'Something went wrong, please try again!' );
                                }
                            } else {
                                die( 'Something went wrong, please try again!' );
                            }

                        } else {
                            die( 'There are no account in this account number, please try again!' );

                        }
                        $this->index( $_SESSION['customer_id'] );
                    } else {
                        die( 'Adding personal loan is failed, please try again' );
                    }
                    ;
                } else {
                    if ( $this->loanModel->addBusinessLoan( $loanId ) ) {

                        if ( $this->accountModel->checkSavingAccountByAccNo( $data['saving_account_number'], $data['account_number'] ) ) {
                            if ( $this->depositModel->addDeposit( $data ) ) {
                                $depositId = $this->depositModel->getDepositCount();
                                if ( $this->depositModel->addSavingDeposit( $depositId, $data ) ) {
                                    $this->accountModel->savingDeposit( $data );
                                    $this->index( $_SESSION['customer_id'] );
                                } else {
                                    die( 'Something went wrong, please try again!' );
                                }
                            } else {
                                die( 'Something went wrong, please try again!' );
                            }

                        } else {
                            die( 'There are no account in this account number, please try again!' );

                        }
                        $this->index( $_SESSION['customer_id'] );
                    } else {
                        die( 'Adding Business loan is failed, please try again' );
                    }
                }

            } else {
                die( 'Something went wrong, please try again!' );
            }
                } else {
                    die( 'The loan amount of upto 60% of the original FD amount, with an upper bound of 500,000. , please try again' );
                }

            } else {
                die( 'There is no fixed deposit, please try again' );
            }
          

        }
    }
}