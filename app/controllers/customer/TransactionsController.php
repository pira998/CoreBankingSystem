<?php
class Transactions extends Controller {
    public function __construct() {
 
    }

    public function index($id) {


        $this->view('customer/transactions/index');
    }
}