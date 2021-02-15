<?php
class Withdrawals extends Controller {
    public function __construct() {
 
    }

    public function index() {

        $this->view('employee/withdrawals/index');

    }
}