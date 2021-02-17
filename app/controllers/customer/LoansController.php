<?php
class Loans extends Controller {
    public function __construct() {
 
    }

    public function index($id) {



        $data = [
          
        ];
        $this->view('customer/loans/index',$data);

    }
}