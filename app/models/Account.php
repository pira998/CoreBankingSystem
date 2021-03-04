<<<<<<< HEAD
<?php

class Account{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getSavingAccountInfo() {

        $this->db->query( 'CALL `getSavingAccountInfo`();' );
        
        $results = $this->db->resultSet();

        return $results;

    }
     public function getCheckingAccountInfo() {

        $this->db->query( 'CALL `getCheckingAccountInfo`();' );
        
        $results = $this->db->resultSet();

        return $results;

    }
    public function checkAccount($data){
        $this->db->query( 'CALL `checkAccount`(:customer_id,:branch_id);' );
        $this->db->bind(':branch_id', $data['branch_id']);
        $this->db->bind(':customer_id', $data['customer_id']);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }

    public function checkSavingAccount($data){
        $this->db->query( 'CALL `checkSavingAccount`(:customer_id,:branch_id);' );
        $this->db->bind(':branch_id', $data['branch_id']);
        $this->db->bind(':customer_id', $data['customer_id']);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }
    public function checkSavingAccountByAccNo($savAccNo,$accNo){
        $this->db->query( 'CALL `checkSavingAccountByAccNo`(:saving_account_number,:account_number);' );
        $this->db->bind(':saving_account_number', $savAccNo);
        $this->db->bind(':account_number', $accNo);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }
    public function checkCheckingAccountByAccNo($checkAccNo,$accNo){
        $this->db->query( 'CALL `checkCheckingAccountByAccNo`(:checking_account_number,:account_number);' );
        $this->db->bind(':checking_account_number', $checkAccNo);
        $this->db->bind(':account_number', $accNo);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }
   


     public function checkCheckingAccount($data){
        $this->db->query( 'CALL `checkCheckingAccount`(:customer_id,:branch_id);' );
        $this->db->bind(':branch_id', $data['branch_id']);
        $this->db->bind(':customer_id', $data['customer_id']);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }


    public function checkSavingMinimumAmount($savingInterestId,$amount){
        $this->db->query( 'CALL `checkSavingMinimumAmount`(:saving_interest_id,:amount,@result);' );
        $this->db->bind(':saving_interest_id', $savingInterestId);
        $this->db->bind(':amount', (int)$amount);
        $this->db->execute();
        $this->db->query('SELECT @result AS `result`');
        return $this->db->resultFunction();

   

    }
    public function addAccount($data){
        $this->db->query('CALL `addAccount`(:customer_id,:branch_id);');

        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':branch_id', $data['branch_id']);

    

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function getAccountNumber($data){

        $this->db->query( 'CALL `checkAccount`(:customer_id,:branch_id);' );
        $this->db->bind(':branch_id', $data['branch_id']);
        $this->db->bind(':customer_id', $data['customer_id']);
      

         $row = $this->db->single();
         return $row;

       

    }

    public function addSavingAccount($accountNumber,$data){
        $this->db->query('CALL `addSavingAccount`(:account_number,:saving_interest_id,:balance);');
        $this->db->bind(':balance', $data['balance']);
        $this->db->bind(':account_number', $accountNumber);
        $this->db->bind(':saving_interest_id', $data['saving_interest_id']);
    

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function addCheckingAccount($accountNumber,$data){
        $this->db->query('CALL `addCheckingAccount`(:account_number,:balance);');

        $this->db->bind(':account_number', $accountNumber);
        $this->db->bind(':balance', $data['balance']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function savingDeposit($data){
        $this->db->query('CALL `savingDeposit`(:account_number,:saving_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':saving_account_number', $data['saving_account_number']);
        $this->db->bind(':amount', (int)$data['amount']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function savingReceived($data){
        $this->db->query('CALL `savingReceived`(:account_number,:saving_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':saving_account_number', $data['saving_account_number']);
        $this->db->bind(':amount', (int)$data['amount']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function savingWithdraw($data){
        $this->db->query('CALL `savingWithdraw`(:account_number,:saving_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':saving_account_number', $data['saving_account_number']);
        $this->db->bind(':amount', (int)$data['amount']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function savingSent($data){
        $this->db->query('CALL `savingSent`(:account_number,:saving_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':saving_account_number', $data['saving_account_number']);
        $this->db->bind(':amount', (int)$data['amount']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function checkingDeposit($data){
        $this->db->query('CALL `checkingDeposit`(:account_number,:checking_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':checking_account_number', $data['checking_account_number']);
        $this->db->bind(':amount', $data['amount']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function checkingWithdraw($data){
        $this->db->query('CALL `checkingWithdraw`(:account_number,:checking_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':checking_account_number', $data['checking_account_number']);
        $this->db->bind(':amount', $data['amount']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function checkSavingAccountBalance($data){
        $this->db->query('CALL `checkSavingAccountBalance`(:account_number,:saving_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':saving_account_number', $data['saving_account_number']);
        $this->db->bind(':amount', (int)$data['amount']);

        $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }
    
    public function checkCheckingAccountBalance($data){
        $this->db->query('CALL `checkCheckingAccountBalance`(:account_number,:checking_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':checking_account_number', $data['checking_account_number']);
        $this->db->bind(':amount', (int)$data['amount']);

        $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }
    public function findAccountBalance($id){
        $this->db->query('SELECT balance FROM accounts WHERE customer_id= :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
}
=======
<?php

class Account{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getSavingAccountInfo() {

        $this->db->query( 'CALL `getSavingAccountInfo`();' );
        
        $results = $this->db->resultSet();

        return $results;

    }
     public function getCheckingAccountInfo() {

        $this->db->query( 'CALL `getCheckingAccountInfo`();' );
        
        $results = $this->db->resultSet();

        return $results;

    }
    public function checkAccount($data){
        $this->db->query( 'CALL `checkAccount`(:customer_id,:branch_id);' );
        $this->db->bind(':branch_id', $data['branch_id']);
        $this->db->bind(':customer_id', $data['customer_id']);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }

    public function checkSavingAccount($data){
        $this->db->query( 'CALL `checkSavingAccount`(:customer_id,:branch_id);' );
        $this->db->bind(':branch_id', $data['branch_id']);
        $this->db->bind(':customer_id', $data['customer_id']);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }
    public function checkSavingAccountByAccNo($savAccNo,$accNo){
        $this->db->query( 'CALL `checkSavingAccountByAccNo`(:saving_account_number,:account_number);' );
        $this->db->bind(':saving_account_number', $savAccNo);
        $this->db->bind(':account_number', $accNo);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }
    public function checkCheckingAccountByAccNo($checkAccNo,$accNo){
        $this->db->query( 'CALL `checkCheckingAccountByAccNo`(:checking_account_number,:account_number);' );
        $this->db->bind(':checking_account_number', $checkAccNo);
        $this->db->bind(':account_number', $accNo);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }
   


     public function checkCheckingAccount($data){
        $this->db->query( 'CALL `checkCheckingAccount`(:customer_id,:branch_id);' );
        $this->db->bind(':branch_id', $data['branch_id']);
        $this->db->bind(':customer_id', $data['customer_id']);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }


    public function checkSavingMinimumAmount($savingInterestId,$amount){
        $this->db->query( 'CALL `checkSavingMinimumAmount`(:saving_interest_id,:amount,@result);' );
        $this->db->bind(':saving_interest_id', $savingInterestId);
        $this->db->bind(':amount', (int)$amount);
        $this->db->execute();
        $this->db->query('SELECT @result AS `result`');
        return $this->db->resultFunction();

   

    }
    public function addAccount($data){
        $this->db->query('CALL `addAccount`(:customer_id,:branch_id);');

        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':branch_id', $data['branch_id']);

    

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function getAccountNumber($data){

        $this->db->query( 'CALL `checkAccount`(:customer_id,:branch_id);' );
        $this->db->bind(':branch_id', $data['branch_id']);
        $this->db->bind(':customer_id', $data['customer_id']);
      

         $row = $this->db->single();
         return $row;

       

    }

    public function addSavingAccount($accountNumber,$data){
        $this->db->query('CALL `addSavingAccount`(:account_number,:saving_interest_id,:balance);');
        $this->db->bind(':balance', $data['balance']);
        $this->db->bind(':account_number', $accountNumber);
        $this->db->bind(':saving_interest_id', $data['saving_interest_id']);
    

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function addCheckingAccount($accountNumber,$data){
        $this->db->query('CALL `addCheckingAccount`(:account_number,:balance);');

        $this->db->bind(':account_number', $accountNumber);
        $this->db->bind(':balance', $data['balance']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function savingDeposit($data){
        $this->db->query('CALL `savingDeposit`(:account_number,:saving_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':saving_account_number', $data['saving_account_number']);
        $this->db->bind(':amount', (int)$data['amount']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function savingReceived($data){
        $this->db->query('CALL `savingReceived`(:account_number,:saving_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':saving_account_number', $data['saving_account_number']);
        $this->db->bind(':amount', (int)$data['amount']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function savingWithdraw($data){
        $this->db->query('CALL `savingWithdraw`(:account_number,:saving_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':saving_account_number', $data['saving_account_number']);
        $this->db->bind(':amount', (int)$data['amount']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function savingSent($data){
        $this->db->query('CALL `savingSent`(:account_number,:saving_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':saving_account_number', $data['saving_account_number']);
        $this->db->bind(':amount', (int)$data['amount']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function checkingDeposit($data){
        $this->db->query('CALL `checkingDeposit`(:account_number,:checking_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':checking_account_number', $data['checking_account_number']);
        $this->db->bind(':amount', $data['amount']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function checkingWithdraw($data){
        $this->db->query('CALL `checkingWithdraw`(:account_number,:checking_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':checking_account_number', $data['checking_account_number']);
        $this->db->bind(':amount', $data['amount']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function checkSavingAccountBalance($data){
        $this->db->query('CALL `checkSavingAccountBalance`(:account_number,:saving_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':saving_account_number', $data['saving_account_number']);
        $this->db->bind(':amount', (int)$data['amount']);

        $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }
    
    public function checkCheckingAccountBalance($data){
        $this->db->query('CALL `checkCheckingAccountBalance`(:account_number,:checking_account_number,:amount);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':checking_account_number', $data['checking_account_number']);
        $this->db->bind(':amount', (int)$data['amount']);

        $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }
}
>>>>>>> e83341e485aa73c3cd79bdf21450d581c8e052f7
