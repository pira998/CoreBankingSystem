<<<<<<< HEAD
<?php

class Deposit {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAllSavingDepositsInfo() {

        $this->db->query( 'CALL `getAllSavingDepositsInfo`();' );

        $results = $this->db->resultSet();

        return $results;

    }

    public function getAllCheckingDepositsInfo() {

        $this->db->query( 'CALL `getAllCheckingDepositsInfo`();' );

        $results = $this->db->resultSet();

        return $results;

    }

    public function findAllLoanPayments() {

        $this->db->query( 'CALL `getAllLoanPayments`();' );

        $results = $this->db->resultSet();

        return $results;

    }

    public function addDeposit( $data ) {
        //INSERT INTO customers ( customer_id, dob, name, address, phone_number ) VALUES ( :customer_id, :dob, :name, :address, :phone_number )
        $this->db->query( 'CALL `addDeposit`(:amount);' );

        $this->db->bind( ':amount', $data['amount'] );

        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }

    public function addSavingDeposit( $deposit_id, $data ) {
        //INSERT INTO customers ( customer_id, dob, name, address, phone_number ) VALUES ( :customer_id, :dob, :name, :address, :phone_number )
        $this->db->query( 'CALL `addSavingDeposit`(:deposit_id,:account_number,:saving_account_number);' );

        $this->db->bind( ':deposit_id', $deposit_id );
        $this->db->bind( ':account_number', $data['account_number'] );
        $this->db->bind( ':saving_account_number', $data['saving_account_number'] );

        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }

    public function addCheckingDeposit( $deposit_id, $data ) {
        //INSERT INTO customers ( customer_id, dob, name, address, phone_number ) VALUES ( :customer_id, :dob, :name, :address, :phone_number )
        $this->db->query( 'CALL `addCheckingDeposit`(:deposit_id,:account_number,:checking_account_number);' );
        $this->db->bind( ':deposit_id', $deposit_id );
        $this->db->bind( ':account_number', $data['account_number'] );
        $this->db->bind( ':checking_account_number', $data['checking_account_number'] );

        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }

    public function addLoanPaymentEntry( $data ) {
            $this->db->query( 'CALL `addLoanPaymentEntry`(:loan_id,:amount);' );

        $this->db->bind( ':loan_id', $data['loan_id'] );
        $this->db->bind( ':amount', $data['amount'] );

        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }

    public function getDepositCount() {
        //SELECT * FROM deposit_entries
        $this->db->query( 'CALL `getAllDeposits`()' );

        $results = $this->db->rowCount();

        return $results;
    }

=======
<?php

class Deposit {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAllSavingDepositsInfo() {

        $this->db->query( 'CALL `getAllSavingDepositsInfo`();' );

        $results = $this->db->resultSet();

        return $results;

    }

    public function getAllCheckingDepositsInfo() {

        $this->db->query( 'CALL `getAllCheckingDepositsInfo`();' );

        $results = $this->db->resultSet();

        return $results;

    }

    public function findAllLoanPayments() {

        $this->db->query( 'CALL `getAllLoanPayments`();' );

        $results = $this->db->resultSet();

        return $results;

    }

    public function addDeposit( $data ) {
        //INSERT INTO customers ( customer_id, dob, name, address, phone_number ) VALUES ( :customer_id, :dob, :name, :address, :phone_number )
        $this->db->query( 'CALL `addDeposit`(:amount);' );

        $this->db->bind( ':amount', $data['amount'] );

        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }

    public function addSavingDeposit( $deposit_id, $data ) {
        //INSERT INTO customers ( customer_id, dob, name, address, phone_number ) VALUES ( :customer_id, :dob, :name, :address, :phone_number )
        $this->db->query( 'CALL `addSavingDeposit`(:deposit_id,:account_number,:saving_account_number);' );

        $this->db->bind( ':deposit_id', $deposit_id );
        $this->db->bind( ':account_number', $data['account_number'] );
        $this->db->bind( ':saving_account_number', $data['saving_account_number'] );

        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }

    public function addCheckingDeposit( $deposit_id, $data ) {
        //INSERT INTO customers ( customer_id, dob, name, address, phone_number ) VALUES ( :customer_id, :dob, :name, :address, :phone_number )
        $this->db->query( 'CALL `addCheckingDeposit`(:deposit_id,:account_number,:checking_account_number);' );
        $this->db->bind( ':deposit_id', $deposit_id );
        $this->db->bind( ':account_number', $data['account_number'] );
        $this->db->bind( ':checking_account_number', $data['checking_account_number'] );

        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }

    public function addLoanPaymentEntry( $data ) {
            $this->db->query( 'CALL `addLoanPaymentEntry`(:loan_id,:amount);' );

        $this->db->bind( ':loan_id', $data['loan_id'] );
        $this->db->bind( ':amount', $data['amount'] );

        if ( $this->db->execute() ) {

            return true;
        } else {
            return false;
        }
    }

    public function getDepositCount() {
        //SELECT * FROM deposit_entries
        $this->db->query( 'CALL `getAllDeposits`()' );

        $results = $this->db->rowCount();

        return $results;
    }

>>>>>>> e83341e485aa73c3cd79bdf21450d581c8e052f7
}