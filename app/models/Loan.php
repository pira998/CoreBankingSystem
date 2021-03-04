<<<<<<< HEAD
<?php

class Loan {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findAllLoans() {
        $this->db->query( 'CALL `getAllLoans`();' );

        $results = $this->db->resultSet();

        return $results;
    }
   

    public function addLoan( $data ) {
        $this->db->query( 'CALL `createLoan`(:account_number,:saving_account_number,:amount,:duration,:interest_rate);' );

        $this->db->bind( ':account_number', $data['account_number'] );
        $this->db->bind( ':saving_account_number', $data['saving_account_number'] );
        $this->db->bind( ':amount', $data['amount'] );
        $this->db->bind( ':duration', $data['duration'] );
        $this->db->bind( ':interest_rate', $data['interest_rate'] );

        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }

    }

    public function updateLoanPayment($data){
         $this->db->query( 'CALL `updateLoan`(:loan_id,:amount);' );

        $this->db->bind( ':loan_id', $data['loan_id'] );

        $this->db->bind( ':amount', $data['amount'] );


        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }

    public function addPersonalLoan($loanId){
        $this->db->query( 'CALL `createPersonalLoan`(:loan_id);' );

        $this->db->bind( ':loan_id', $loanId );
        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }
    public function addBusinessLoan($loanId){
        $this->db->query( 'CALL `createBusinessLoan`(:loan_id);' );

        $this->db->bind( ':loan_id', $loanId );
        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }


    public function getLoanId(){
        $this->db->query( 'CALL `getAllLoansCount`();' );
        $results = $this->db->rowCount();
         
        return $results;
    }
    public function findAllLoansById($id){
        $this->db->query( 'CALL `getAllLoansById`(:customer_id);' );
        $this->db->bind( ':customer_id', $id );
        $results = $this->db->resultSet();

        return $results;
    }
    public function findAllLoanAmounts($id){
        $this->db->query( 'CALL `findAllLoanAmounts`(:customer_id);' );
        $this->db->bind( ':customer_id', $id );
        $results = $this->db->resultSet();

        return $results;
    }
=======
<?php

class Loan {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findAllLoans() {
        $this->db->query( 'CALL `getAllLoans`();' );

        $results = $this->db->resultSet();

        return $results;
    }
   

    public function addLoan( $data ) {
        $this->db->query( 'CALL `createLoan`(:account_number,:saving_account_number,:amount,:duration,:interest_rate);' );

        $this->db->bind( ':account_number', $data['account_number'] );
        $this->db->bind( ':saving_account_number', $data['saving_account_number'] );
        $this->db->bind( ':amount', $data['amount'] );
        $this->db->bind( ':duration', $data['duration'] );
        $this->db->bind( ':interest_rate', $data['interest_rate'] );

        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }

    }

    public function updateLoanPayment($data){
         $this->db->query( 'CALL `updateLoan`(:loan_id,:amount);' );

        $this->db->bind( ':loan_id', $data['loan_id'] );

        $this->db->bind( ':amount', $data['amount'] );


        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }

    public function addPersonalLoan($loanId){
        $this->db->query( 'CALL `createPersonalLoan`(:loan_id);' );

        $this->db->bind( ':loan_id', $loanId );
        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }
    public function addBusinessLoan($loanId){
        $this->db->query( 'CALL `createBusinessLoan`(:loan_id);' );

        $this->db->bind( ':loan_id', $loanId );
        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }


    public function getLoanId(){
        $this->db->query( 'CALL `getAllLoansCount`();' );
        $results = $this->db->rowCount();
         
        return $results;
    }
    public function findAllLoansById($id){
        $this->db->query( 'CALL `getAllLoansById`(:customer_id);' );
        $this->db->bind( ':customer_id', $id );
        $results = $this->db->resultSet();

        return $results;
    }

>>>>>>> e83341e485aa73c3cd79bdf21450d581c8e052f7
}