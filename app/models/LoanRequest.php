<?php
class LoanRequest{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findAllLoanRequests() {
        $this->db->query('CALL `getAllLoanRequests`();');

        $results = $this->db->resultSet();

        return $results;
    }
    public function findAllLoanRequestsById($id){
        $this->db->query( 'CALL `getAllLoanRequestsById`(:customer_id);' );
        $this->db->bind( ':customer_id', $id );
        $results = $this->db->resultSet();

        return $results;
    }

    public function addLoanRequest( $loanId ) {
        $this->db->query( 'CALL `createLoanRequest`(:loan_id);' );

        $this->db->bind( ':loan_id', $loanId );

        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }

    }

    public function approveLoan($id){
        $this->db->query('CALL `approveLoan`(:loan_request_id)');
        $this->db->bind(':loan_request_id', $id);

        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function cancelLoan($id){
        $this->db->query('CALL `cancelLoan`(:loan_request_id)');
        $this->db->bind(':loan_request_id', $id);

        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}