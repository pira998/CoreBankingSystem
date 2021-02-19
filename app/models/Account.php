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
        $this->db->query('CALL `addAccount`(:customer_id,:balance,:branch_id);');

        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':branch_id', $data['branch_id']);
        $this->db->bind(':balance', $data['balance']);
    

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
        $this->db->query('CALL `addSavingAccount`(:account_number,:saving_interest_id);');

        $this->db->bind(':account_number', $accountNumber);
        $this->db->bind(':saving_interest_id', $data['saving_interest_id']);
    

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function addCheckingAccount($accountNumber){
        $this->db->query('CALL `addCheckingAccount`(:account_number);');

        $this->db->bind(':account_number', $accountNumber);
       

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
}