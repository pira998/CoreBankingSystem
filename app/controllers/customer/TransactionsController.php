<?php

class Transactions extends Controller {
    public function __construct() {
        $this->transactionModel = $this->model( 'Transaction' );
         $this->accountModel = $this->model('Account');
    }

    public function index( $id ) {
        $transactions = $this->transactionModel->findAllTransactionsById($id);
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/customer/profile/login' );
        }
        $data = [
            'title' => 'transactions page',
            'transactions' => $transactions
        ];
        $this->view( 'customer/transactions/index',$data );
    }

    public function create() {
        $data = [
            'to_account_number'=>'',
            'to_saving_account_number'=>'',
            'from_account_number'=>'',
            'from_saving_account_number'=>'',
            'amount'=> '',
            'description' => ''

        ];

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

            $data = [
                'to_account_number' => trim( $_POST['to_account_number'] ),
                'to_saving_account_number' => trim( $_POST['to_saving_account_number'] ),
                'from_account_number' => trim( $_POST['from_account_number'] ),
                'from_saving_account_number' => trim( $_POST['from_saving_account_number'] ),
                'amount' => trim( $_POST['amount'] ),
                'description' => trim( $_POST['description'] ),
                

            ];


            if ( $this->accountModel->checkSavingAccountByAccNo( $data['to_saving_account_number'], $data['to_account_number'] ) ) {
                if ( $this->transactionModel->sendMoney( $data ) ) {
                    $depositData = [
                        'account_number' => $data['to_account_number'],
                        'saving_account_number' => $data['to_saving_account_number'],
                        'amount' => $data['amount'],
                         
                    ];
                    $this->accountModel->savingReceived( $depositData );
                    $withdrawData = [
                        'account_number' => $data['from_account_number'],
                        'saving_account_number' => $data['from_saving_account_number'],
                         'amount' => $data['amount'],
                    ];
                    $this->accountModel->savingSent( $withdrawData );
                    $this->index($_SESSION['customer_id']);
                }

            } else {
                die( 'There are no account in this account number, please try again!' );

            }

        }

    }
}
