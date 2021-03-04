<?php
class Employee {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findAllEmployees() {
        $this->db->query('SELECT * FROM employees ORDER BY employee_id DESC');

        $results = $this->db->resultSet();

        return $results;
    }
    public function getInfo($id){
        $this->db->query('SELECT * FROM employees WHERE employee_id= :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;

    }

    public function updateProfile($data){
        $this->db->query('UPDATE employees SET address=:address WHERE employee_id = :id');

        $this->db->bind(':id', $data['id']);
        
     
        $this->db->bind(':address', $data['address']);
        

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }



    }

    public function register($data) {
        $this->db->query('CALL `addEmployee`(:username,:name,:phone_number,:password,:nic,:branch_id,:address);');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':name', $data['name']);
      
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':phone_number', $data['phone_number']);
        $this->db->bind(':branch_id', $_SESSION['branch_id']);

        $this->db->bind(':address', $data['address']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM employees WHERE username = :username');

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

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM librarian WHERE email = :email');
        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);
        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function findUserByUsername($username) {
        //Prepared statement
        $this->db->query('SELECT * FROM librarian WHERE username = :username');
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
