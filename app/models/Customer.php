<?php
class Customer {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function isIndividualCustomer($id){
        $this->db->query("CALL `isIndividualCustomer`(:aid);");
        $this->db->bind(':aid', (int)$id);
      

         $results = $this->db->rowCount();
         if($results===1){
             return true;
         }
         else{
             return false;
         }

    }
     public function getIndividualCustomerInfo($id){
        $this->db->query('SELECT * FROM customers JOIN individual_customers WHERE customers.customer_id= :customer_id AND customers.customer_id=individual_customers.customer_id');
        $this->db->bind(':customer_id', $id);

        $row = $this->db->single();

        return $row;

    }

    public function getOrganizationalCustomerInfo($id){
        $this->db->query('SELECT * FROM customers JOIN organization_customers WHERE customers.customer_id= :customer_id ');
        $this->db->bind(':customer_id', (int)$id);

        $row = $this->db->single();

        return $row;

    }
    public function findAllCustomers() {
        $this->db->query('SELECT * FROM customers ORDER BY customer_id DESC');

        $results = $this->db->resultSet();

        return $results;
    }
    public function getCustomerID($data){
        $this->db->query('SELECT * FROM customers WHERE dob =:dob AND address=:address AND phone_number=:phone_number AND name=:name ');
         $this->db->bind(':dob',$data['dob']);
         $this->db->bind(':phone_number',$data['phone_number']);
         $this->db->bind(':address',$data['address']);
         $this->db->bind(':name',$data['name']);


        $row = $this->db->single();

        return $row;
    }





    // public function deleteCustomerById($id){
        
    //     $this->db->query('DELETE FROM customers WHERE customer_id = :id');

    //     $this->db->bind(':id', (int)$id);

    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
        
    // }
    // public function deleteIndividualCustomer($id){
        
    //     $this->db->query('DELETE FROM individual_customers WHERE customer_id = :id');

    //     $this->db->bind(':id', (int)$id);

    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
        
    // }
    // public function deleteOrganizationalCustomerInfo($id){
        
    //     $this->db->query('DELETE FROM customers WHERE customer_id = :id');

    //     $this->db->bind(':id', (int)$id);

    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
        
    // }




    public function addCustomer($data) {
        $this->db->query('INSERT INTO customers (customer_id,dob,name, address, phone_number) VALUES (:customer_id,:dob,:name,:address,:phone_number)');

        $this->db->bind(':customer_id', '');
        $this->db->bind(':dob',$data['dob']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':phone_number', $data['phone_number']);
       

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
     public function addIndividualCustomer($data) {
        $this->db->query('INSERT INTO individual_customers (individual_customer_id,customer_id, nic) VALUES (:individual_customer_id,:customer_id, :nic)');

        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':individual_customer_id', '');
        $this->db->bind(':nic', $data['nic']);
       

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function updateProfile($data){
        $this->db->query('UPDATE customers SET phone_number=:phone_number,address=:address WHERE customer_id = :customer_id');

        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':phone_number', $data['phone_number']);
        $this->db->bind(':address', $data['address']);
       

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }



    }
    public function getTotalCustomersCount(){

         $this->db->query('SELECT * FROM customers');

         $results = $this->db->rowCount();
         
         return $results;

    }
   
    public function findUserByUsername($username) {
        //Prepared statement
        $this->db->query('SELECT * FROM customers WHERE username = :username');
        //Email param will be binded with the email variable
        $this->db->bind(':username', $username);
        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    
}
