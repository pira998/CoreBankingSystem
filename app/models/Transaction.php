<?php

class Transaction {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function sendMoney($data){
         $this->db->query( 'CALL `sendMoney`(:to_account_number,:to_saving_account_number,:from_account_number,:from_saving_account_number,:amount,:description);' );

        $this->db->bind( ':to_account_number', $data['to_account_number'] );
        $this->db->bind( ':to_saving_account_number', $data['to_saving_account_number'] );
        $this->db->bind( ':from_account_number', $data['from_account_number'] );
        $this->db->bind( ':from_saving_account_number', $data['from_saving_account_number'] );
        $this->db->bind( ':amount', $data['amount'] );
        $this->db->bind( ':description', $data['description'] );
        

        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }

    } 
    public function findAllTransactionsById($id){
        $this->db->query('CALL `getAllTransactionsById`(:customer_id)');
         $this->db->bind(':customer_id', $id);
         $results = $this->db->resultSet();

        return $results;
    }
}


