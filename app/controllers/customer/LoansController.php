<?php
class Loans extends Controller {
    public function __construct() {
 
    }

    public function index($id) {

        $this->view('customer/loans/index');

    }
}