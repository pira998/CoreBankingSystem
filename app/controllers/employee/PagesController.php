<?php
class Pages extends Controller {
    public function __construct() {
        
        $this->customerModel = $this->model('Customer');


    }

    public function index() {
        $customerCount = $this->customerModel->getTotalCustomersCount();
        // $booksInfo = $this->bookModel->findAllBooks();
        $totalBook = 0;
        $availableBook = 0;
        // foreach ($booksInfo as $bookInfo){
        //     $totalBook = (int)$totalBook+ (int)$bookInfo->quantity;
        // $availableBook =(int)$availableBook+ (int)$bookInfo->available;
        // }

        $data = [
            'title' => 'Home page',
            'customerCount' => $customerCount,
            // 'totalBook' => $totalBook,
            // 'availableBook' => $availableBook,

        ];

        $this->view('employee/index', $data);
    }
    

    public function about() {
        $this->view('about');
    }
}
