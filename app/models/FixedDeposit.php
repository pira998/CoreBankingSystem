<<<<<<< HEAD
<?php
class FixedDeposit {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findAllFixedDeposits() {
        $this->db->query('CALL `getAllFixedDeposits`();');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllFixedDepositsById($id){
        $this->db->query('CALL `getAllFixedDepositsById`(:customer_id)');
         $this->db->bind(':customer_id', $id);
         $results = $this->db->resultSet();

        return $results;
    }

    public function createFD($data){
        $this->db->query('CALL `createFD`(:account_number,:saving_account_number,:amount,:plan_id);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':saving_account_number', $data['saving_account_number']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':plan_id', $data['plan_id']);
    

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }

    }
    public function checkFixedDeposit($fixedDepositId){
        $this->db->query( 'CALL `checkFixedDeposit`(:fixed_deposit_id);' );
        $this->db->bind(':fixed_deposit_id', $fixedDepositId);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }
    public function checkLoanAmountValidity($amount,$fixedDepositId){
        $this->db->query( 'CALL `checkLoanAmountValidity`(:amount,:fixed_deposit_id,@result);' );
        $this->db->bind(':fixed_deposit_id', $fixedDepositId);
        $this->db->bind(':amount', $amount);
      

        $this->db->execute();
        $this->db->query('SELECT @result AS `result`');
        return $this->db->resultFunction();

    }


=======
<?php
class FixedDeposit {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findAllFixedDeposits() {
        $this->db->query('CALL `getAllFixedDeposits`();');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllFixedDepositsById($id){
        $this->db->query('CALL `getAllFixedDepositsById`(:customer_id)');
         $this->db->bind(':customer_id', $id);
         $results = $this->db->resultSet();

        return $results;
    }

    public function createFD($data){
        $this->db->query('CALL `createFD`(:account_number,:saving_account_number,:amount,:plan_id);');

        $this->db->bind(':account_number', $data['account_number']);
        $this->db->bind(':saving_account_number', $data['saving_account_number']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':plan_id', $data['plan_id']);
    

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }

    }
    public function checkFixedDeposit($fixedDepositId){
        $this->db->query( 'CALL `checkFixedDeposit`(:fixed_deposit_id);' );
        $this->db->bind(':fixed_deposit_id', $fixedDepositId);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }
    }
    public function checkLoanAmountValidity($amount,$fixedDepositId){
        $this->db->query( 'CALL `checkLoanAmountValidity`(:amount,:fixed_deposit_id,@result);' );
        $this->db->bind(':fixed_deposit_id', $fixedDepositId);
        $this->db->bind(':amount', $amount);
      

        $this->db->execute();
        $this->db->query('SELECT @result AS `result`');
        return $this->db->resultFunction();

    }


>>>>>>> e83341e485aa73c3cd79bdf21450d581c8e052f7
}