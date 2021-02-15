<?php
class Loans extends Controller {
    public function __construct() {
 
    }

    public function index() {

        $this->view('employee/loans/index');

    }
}