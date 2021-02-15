<?php
class FixedDeposits extends Controller {
    public function __construct() {
 
    }

    public function index($id) {

        $this->view('customer/fixedDeposits/index');

    }
}