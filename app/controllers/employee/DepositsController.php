<?php
class Deposits extends Controller {
    public function __construct() {
 
    }

    public function index() {

        $this->view('employee/deposits/index');

    }
}