<?php
class LoanRequests extends Controller {
    public function __construct() {
 
    }

    public function index($id) {


        $this->view('customer/loanRequests/index');
    }
}