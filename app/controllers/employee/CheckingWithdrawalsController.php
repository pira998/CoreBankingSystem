<?php
class CheckingWithdrawals extends Controller {
    public function __construct() {
         $this->withdrawModel = $this->model( 'Withdraw' );
        $this->accountModel = $this->model( 'Account' );
    }

    public function index() {
        $info = $this->withdrawModel->getAllCheckingWithdrawsInfo();
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        }
        $data = [
            'title' => 'saving withdraws page',
            'checking_withdraws' => $info
        ];

        $this->view('employee/withdrawals/Checking',$data);

    }

    public function create() {
        $data = [
            'account_number'=>'',
            'checking_account_number'=>'',
            'amount'=> '',

        ];

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

            $data = [
                'account_number' => trim( $_POST['account_number'] ),
                'checking_account_number' => trim( $_POST['checking_account_number'] ),
                'amount' => trim( $_POST['amount'] ),

            ];
            $account = $this->accountModel->checkCheckingAccountByAccNo( $data['checking_account_number'], $data['account_number'] );
            if ( $account ) {
                if ($this->accountModel->checkCheckingAccountBalance( $data ) ) {
                    if ( $this->withdrawModel->addWithdraw( $data ) ) {
                        $withdrawId = $this->withdrawModel->getWithdrawCount();
                        if ( $this->withdrawModel->addCheckingWithdraw( $withdrawId, $data ) ) {
                            $this->accountModel->checkingWithdraw( $data );
                            $this->index();
                        } else {
                            die( 'Something went wrong, please try again!' );
                        }
                    } else {
                        die( 'Something went wrong, please try again!' );
                    }
                } else {
                    die( 'Account have not enough money , please try again!' );
                }

            } else {
                die( 'There are no account in this account number, please try again!' );

            }

        }

    }
}