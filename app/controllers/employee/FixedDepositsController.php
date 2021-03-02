<?php
class FixedDeposits extends Controller {
    public function __construct() {
         $this->accountModel = $this->model('Account');
        $this->fixedDepositModel = $this->model('FixedDeposit');
    }

   

    public function index() {
        $fixedDeposits = $this->fixedDepositModel->findAllFixedDeposits();
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        }
        $data = [
            'title' => 'fixedDeposits page',
            'fixed_deposits' => $fixedDeposits
        ];

        $this->view('employee/fixedDeposits/index',$data);

    }

    public function create(){
        $data = [
            'account_number'=>'',
            'saving_account_number'=>'',
            'amount'=> '',
            'plan_id' => ''
             
            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'account_number' => trim($_POST['account_number']),
                'saving_account_number' => trim($_POST['saving_account_number']),
                'amount' => trim($_POST['amount']),
                'plan_id' => trim($_POST['plan_id']),
               
            ];
            if($this->accountModel->checkSavingAccountByAccNo($data['saving_account_number'],$data['account_number'])){
                if ($this->fixedDepositModel->createFD($data)) {
                    $this->index();
                } else {
                    die("Something went wrong, please try again!");
                }
            }else{
                die("There are no saving account, You must create it!");
            }
            
            
        }

    }
}