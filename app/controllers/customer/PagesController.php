<?php
class Pages extends Controller {
    public function __construct() {
        
    }

    public function index() {
        // $this->issueBookModel = $this->model('IssueBook');
        // $borrowedBooksCount = $this->issueBookModel->findCountBorrowedBooksByStudentId($_SESSION['user_id']);
        // $notReturnedBookCount = $this->issueBookModel->findCountNotReturnedBooksByStudentId($_SESSION['user_id']);
        // $data = [
        //     'title' => 'Home page',
        //     'borrowedBookCount' => $borrowedBooksCount,
        //     'notReturnBookCount' => $notReturnedBookCount,
            
        // ];

        $this->view('customer/index');
    }
   

    public function about() {
        $this->view('about');
    }
}
