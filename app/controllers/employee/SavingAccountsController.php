<?php
class SavingAccounts extends Controller {
    public function __construct() {
         $this->accountModel = $this->model('Account');
    }

    public function index() {
        $saving_accounts = $this->accountModel->getSavingAccountInfo();
        $data =[
            'saving_accounts' => $saving_accounts
        ];
        $this->view('employee/saving/index',$data);

    }
    public function create(){
        $data = [
            'customer_id' => '',
            'balance' => '',
            'branch_id' => '',
            'saving_interest_id' => '',
     

        ];

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

            $data = [

                'customer_id' => trim( $_POST['customer_id'] ),
                'balance' => trim( $_POST['balance'] ),
                'branch_id' => trim( $_POST['branch_id'] ),
                'saving_interest_id' => trim( $_POST['saving_interest_id'] ),
           
            ];
            // $data['password'] = password_hash( $data['password'], PASSWORD_DEFAULT );

            if (!$this->accountModel->checkAccount($data)){
                $result = $this->accountModel->checkSavingMinimumAmount($data['saving_interest_id'],$data['balance']);
                if($result[0]['result']){
                    if($this->accountModel->addAccount($data)){
                        $result = $this->accountModel->getAccountNumber($data);
                        // print_r($result);
                        $accountNumber = $result->account_number;
                        $this->accountModel->addSavingAccount($accountNumber,$data);
                        $this->index();
         
                    } 
                    
                
                }else {
                        die( 'Sorry you have to put money above minimum amount, please try again!' );
                }

                // if ($this->accountModel->checkSavingMinimumAmount($data['saving_interest_id'],$data['balance'])){
               

            }else {
                if(!$this->accountModel->checkSavingAccount($data)){
                $result = $this->accountModel->checkSavingMinimumAmount($data['saving_interest_id'],$data['balance']);
                if((int)$result[0]['result']){
                    $result = $this->accountModel->getAccountNumber($data);
                    $accountNumber = $result->account_number;
                    $this->accountModel->addSavingAccount($accountNumber,$data);
                    $this->index();
                
                }
                }else{
                     die( 'Sorry account already exist, please try again!' );
                }
            }

        

        }
    }
   
}