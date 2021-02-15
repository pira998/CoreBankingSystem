<?php

class OnlineProfile {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getOnlineAccountInfo( $id ) {

        $this->db->query( 'SELECT * FROM online_accounts WHERE online_account_id= :online_account_id' );
        $this->db->bind( ':online_account_id', ( int )$id );
        $row = $this->db->single();
        return $row;

    }
    public function login($username, $password) {
        $this->db->query('SELECT * FROM online_accounts WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        if ($this->db->rowCount()>0){
            $row = $this->db->single();
        
        
            $hashedPassword = $row->password;

            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        }else {
            return false;
        }
    }
     public function register($data) {
        $this->db->query('INSERT INTO online_accounts (username,open_date,customer_id,password) VALUES(:username,:open_date,:customer_id,:password)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':open_date', date('d-m-Y'));
        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    //Find user by email. Email is passed in by the Controller.
    public function findCustomerByCustomerID($customer_id) {
        //Prepared statement
        $this->db->query('SELECT * FROM online_accounts WHERE customer_id = :customer_id');
        //customer_id param will be binded with the customer_id variable
        $this->db->bind(':customer_id', $customer_id);
        //Check if customer_id is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function findCustomerByUsername($username) {
        //Prepared statement
        $this->db->query('SELECT * FROM online_accounts WHERE username = :username');
        //username param will be binded with the username variable
        $this->db->bind(':username', $username);
        //Check if username is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


}