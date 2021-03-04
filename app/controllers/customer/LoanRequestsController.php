<<<<<<< HEAD
<?php
class LoanRequests extends Controller {
    public function __construct() {
          $this->loanRequestModel = $this->model('LoanRequest');
    }

    public function index($id) {
        $loanRequests = $this->loanRequestModel->findAllLoanRequestsById($id);
         if ( !isCustomerLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/customer/profile/login' );
        }
        $data = [
            'title' => 'loanRequests page',
            'loanRequests' => $loanRequests
        ];

        $this->view('customer/loanRequests/index',$data);
    }
=======
<?php
class LoanRequests extends Controller {
    public function __construct() {
          $this->loanRequestModel = $this->model('LoanRequest');
    }

    public function index($id) {
        $loanRequests = $this->loanRequestModel->findAllLoanRequestsById($id);
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/customer/profile/login' );
        }
        $data = [
            'title' => 'loanRequests page',
            'loanRequests' => $loanRequests
        ];

        $this->view('customer/loanRequests/index',$data);
    }
>>>>>>> e83341e485aa73c3cd79bdf21450d581c8e052f7
}