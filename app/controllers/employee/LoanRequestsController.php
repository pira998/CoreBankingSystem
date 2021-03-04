<<<<<<< HEAD
<?php
class LoanRequests extends Controller {
    public function __construct() {
        $this->loanRequestModel = $this->model('LoanRequest');
    }

    public function index() {
        $loanRequests = $this->loanRequestModel->findAllLoanRequests();
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        }
        $data = [
            'title' => 'loanRequests page',
            'loanRequests' => $loanRequests
        ];
        $this->view('employee/loanRequests/index',$data);

    }
    public function approve($id){
        $this->loanRequestModel->approveLoan($id);
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        }
      
        $this->index();
    }
    public function cancel($id){
        $this->loanRequestModel->cancelLoan($id);
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        }
      
        $this->index();
    }
=======
<?php
class LoanRequests extends Controller {
    public function __construct() {
        $this->loanRequestModel = $this->model('LoanRequest');
    }

    public function index() {
        $loanRequests = $this->loanRequestModel->findAllLoanRequests();
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        }
        $data = [
            'title' => 'loanRequests page',
            'loanRequests' => $loanRequests
        ];
        $this->view('employee/loanRequests/index',$data);

    }
    public function approve($id){
        $this->loanRequestModel->approveLoan($id);
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        }
      
        $this->index();
    }
    public function cancel($id){
        $this->loanRequestModel->cancelLoan($id);
        if ( !isLoggedIn() ) {
            header( 'Location: ' . URLROOT . '/employee/profile/employee_login' );
        }
      
        $this->index();
    }
>>>>>>> e83341e485aa73c3cd79bdf21450d581c8e052f7
}