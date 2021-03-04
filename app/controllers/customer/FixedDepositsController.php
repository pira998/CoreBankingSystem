<?php
class FixedDeposits extends Controller {
    public function __construct() {
        $this->fixedDepositModel = $this->model('FixedDeposit');
        
    }

    public function index($id) {
        $fixedDeposits = $this->fixedDepositModel->findAllFixedDepositsById($id);
        if ( !isCustomerLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/customer/profile/login' );
        }
        $data = [
            'title' => 'fixedDeposits page',
            'fixed_deposits' => $fixedDeposits
        ];
        $this->view('customer/fixedDeposits/index',$data);

    }
}