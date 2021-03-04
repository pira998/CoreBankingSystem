<?php
class Pages extends Controller {
    public function __construct() {
        $this->accountModel = $this->model('Account');
        $this->loanModel = $this->model('Loan');

    }

    public function index() {
        // $this->issueBookModel = $this->model('IssueBook');
        $accountBalance = $this->accountModel->findAccountBalance($_SESSION['customer_id']);
        $totalLoan = $this->loanModel->findAllLoanAmounts($_SESSION['customer_id']);
        // $notReturnedBookCount = $this->issueBookModel->findCountNotReturnedBooksByStudentId($_SESSION['user_id']);
        $data = [
            'title' => 'Home page',
            'accountBalance' => $accountBalance,
            'totalLoan' => $totalLoan,
           
            
        ];
        

        $this->view('customer/index',$data);
    }
   

    public function about() {
        $this->view('about');
    }
}
