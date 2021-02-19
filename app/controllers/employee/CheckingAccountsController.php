<?php
class CheckingAccounts extends Controller {
    public function __construct() {
         $this->accountModel = $this->model('Account');
    }

    public function index() {
        $checking_accounts = $this->accountModel->getCheckingAccountInfo();
        $data =[
            'checking_accounts' => $checking_accounts
        ];
        $this->view('employee/checking/index',$data);

    }
    public function create(){
        $data = [
            'customer_id' => '',
            'balance' => '',
            'branch_id' => '',
        
     

        ];

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

            $data = [

                'customer_id' => trim( $_POST['customer_id'] ),
                'balance' => trim( $_POST['balance'] ),
                'branch_id' => trim( $_POST['branch_id'] ),
               
           
            ];
            // $data['password'] = password_hash( $data['password'], PASSWORD_DEFAULT );

            if (!$this->accountModel->checkAccount($data)){
                
                    if($this->accountModel->addAccount($data)){
                        $result = $this->accountModel->getAccountNumber($data);
                        $accountNumber = $result->account_number;
                        $this->accountModel->addCheckingAccount($accountNumber);
                        $this->index();
         
                    } 
                    
                
                

            
            }else {
                if (!$this->accountModel->checkCheckingAccount($data)){
                     
                    $result = $this->accountModel->getAccountNumber($data);
                    $accountNumber = $result->account_number;
                    $this->accountModel->addCheckingAccount($accountNumber);
                    $this->index();

                }

                else{
                        die( 'Sorry account already exist, please try again!' );
                    }
                }

        

        }
    }
}
