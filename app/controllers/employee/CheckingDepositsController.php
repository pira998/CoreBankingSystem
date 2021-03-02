<?php
class CheckingDeposits extends Controller {
    public function __construct() {
        $this->depositModel = $this->model('Deposit');
        $this->accountModel = $this->model('Account');
    }

    public function index() {
         $info = $this->depositModel->getAllCheckingDepositsInfo();
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        }
        $data = [
            'title' => 'loans page',
            'checking_deposits' => $info
        ];

        $this->view('employee/deposits/Checking',$data);

    }
    public function create(){
        $data = [
                    'account_number'=>'',
                    'checking_account_number'=>'',
                    'amount'=> '',
                   
                    
                    
                ];

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    $data = [
                        'account_number' => trim($_POST['account_number']),
                        'checking_account_number' => trim($_POST['checking_account_number']),
                        'amount' => trim($_POST['amount']),
                     
                    
                    ];
                    if($this->accountModel->checkCheckingAccountByAccNo($data['checking_account_number'],$data['account_number'])){
                        if($this->depositModel->addDeposit($data)){
                        $depositId = $this->depositModel->getDepositCount();
                        if ($this->depositModel->addCheckingDeposit($depositId,$data)) {
                            $this->accountModel->checkingDeposit($data);
                            $this->index();
                        } else {
                            die("Something went wrong, please try again!");
                        }
                    }else{
                        die("Something went wrong, please try again!");
                    }

                    }else{
                        die("There are no account in this account number, please try again!");

                    }
                    
                    
                    
                }

    }
}