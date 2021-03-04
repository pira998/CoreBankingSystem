<<<<<<< HEAD
<?php 

class Withdraw{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAllSavingWithdrawsInfo() {

        $this->db->query( 'CALL `getAllSavingWithdrawsInfo`();' );
        
        $results = $this->db->resultSet();

        return $results;

    }
    public function getAllCheckingWithdrawsInfo() {

        $this->db->query( 'CALL `getAllCheckingWithdrawsInfo`();' );
        
        $results = $this->db->resultSet();

        return $results;

    }
    public function addWithdraw($data){
        //INSERT INTO customers (customer_id,dob,name, address, phone_number) VALUES (:customer_id,:dob,:name,:address,:phone_number)
        $this->db->query('CALL `addWithdraw`(:amount);');

        $this->db->bind(':amount',$data['amount']);

       

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
     public function addSavingWithdraw($Withdraw_id,$data){
        //INSERT INTO customers (customer_id,dob,name, address, phone_number) VALUES (:customer_id,:dob,:name,:address,:phone_number)
        $this->db->query('CALL `addSavingWithdraw`(:Withdraw_id,:account_number,:saving_account_number);');

        $this->db->bind(':Withdraw_id',$Withdraw_id);
        $this->db->bind(':account_number',$data['account_number']);
        $this->db->bind(':saving_account_number',$data['saving_account_number']);

       

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function addCheckingWithdraw($Withdraw_id,$data){
        //INSERT INTO customers (customer_id,dob,name, address, phone_number) VALUES (:customer_id,:dob,:name,:address,:phone_number)
         $this->db->query('CALL `addCheckingWithdraw`(:Withdraw_id,:account_number,:checking_account_number);');
        $this->db->bind(':Withdraw_id',$Withdraw_id);
        $this->db->bind(':account_number',$data['account_number']);
        $this->db->bind(':checking_account_number',$data['checking_account_number']);

       

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
}

    public function getWithdrawCount(){
        //SELECT * FROM Withdraw_entries
        $this->db->query('CALL `getAllWithdraws`()');

         $results = $this->db->rowCount();
         
         return $results;
    }

=======
<?php 

class Withdraw{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAllSavingWithdrawsInfo() {

        $this->db->query( 'CALL `getAllSavingWithdrawsInfo`();' );
        
        $results = $this->db->resultSet();

        return $results;

    }
    public function getAllCheckingWithdrawsInfo() {

        $this->db->query( 'CALL `getAllCheckingWithdrawsInfo`();' );
        
        $results = $this->db->resultSet();

        return $results;

    }
    public function addWithdraw($data){
        //INSERT INTO customers (customer_id,dob,name, address, phone_number) VALUES (:customer_id,:dob,:name,:address,:phone_number)
        $this->db->query('CALL `addWithdraw`(:amount);');

        $this->db->bind(':amount',$data['amount']);

       

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
     public function addSavingWithdraw($Withdraw_id,$data){
        //INSERT INTO customers (customer_id,dob,name, address, phone_number) VALUES (:customer_id,:dob,:name,:address,:phone_number)
        $this->db->query('CALL `addSavingWithdraw`(:Withdraw_id,:account_number,:saving_account_number);');

        $this->db->bind(':Withdraw_id',$Withdraw_id);
        $this->db->bind(':account_number',$data['account_number']);
        $this->db->bind(':saving_account_number',$data['saving_account_number']);

       

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function addCheckingWithdraw($Withdraw_id,$data){
        //INSERT INTO customers (customer_id,dob,name, address, phone_number) VALUES (:customer_id,:dob,:name,:address,:phone_number)
         $this->db->query('CALL `addCheckingWithdraw`(:Withdraw_id,:account_number,:checking_account_number);');
        $this->db->bind(':Withdraw_id',$Withdraw_id);
        $this->db->bind(':account_number',$data['account_number']);
        $this->db->bind(':checking_account_number',$data['checking_account_number']);

       

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
}

    public function getWithdrawCount(){
        //SELECT * FROM Withdraw_entries
        $this->db->query('CALL `getAllWithdraws`()');

         $results = $this->db->rowCount();
         
         return $results;
    }

>>>>>>> e83341e485aa73c3cd79bdf21450d581c8e052f7
}