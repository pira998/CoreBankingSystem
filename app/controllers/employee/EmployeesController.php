<?php
class Employees extends Controller {
    public function __construct() {
        $this->employeeModel = $this->model('Employee');
    }

    public function index() {
        $employees = $this->employeeModel->findAllEmployees();
        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/employee/users/login");
        }
        $data = [
            'title' => 'employees page',
            'employees' => $employees
        ];

        $this->view('employee/employees/index', $data);
    }
    public function create(){
        $data = [
            'id' => '',
            'regis_num' => '',
            'firstname' => '',        
            'firstname' => '',
            'lastname' => '',            
            'username' => '',            
            'grade' => '',         
            'address' => '',           
            'email' => '',         
            'nic' => '',       
            'password' => '',        
            'active' => "Yes",
            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => '',
               
                'firstname' => trim($_POST['firstname']),
                'lastname' => trim($_POST['lastname']),
                'username' => trim($_POST['username']),
                
                'address' => trim($_POST['address']),
                'email' => trim($_POST['email']),
                'nic' => trim($_POST['nic']),
                'password' => trim($_POST['pass']),
                'active' => "Yes",

            ];
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT); 
            if ($this->employeeModel->addemployee($data)) {
                    $this->index();
                } else {
                    die("Something went wrong, please try again!");
                }
            
        }

        
    }
    public function update($id){
        $info = $this->employeeModel->getInfo($id);

        $data = [
            'info' => $info,
            'id' => '',
            'firstname'=> '',
            'lastname'=> '',
            'username'=> '',
            'email'=> '',
            'address'=> '',
        
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'info' => $info,
                'firstname'=> ($_POST["firstname"]),
                'lastname'=> ($_POST["lastname"]),
                'email'=> ($_POST["email"]),
                'address'=> ($_POST["address"]),
               
                
                
            ];

           
            if ($this->employeeModel->updateProfile($data)) {
                $info = $this->employeeModel->getInfo($id);
                $data = [
                    'info' => $info,                   
                ];
                $this->view('employee/employees/update',$data);
                
            } else {
                die("Something went wrong, please try again!");
            }
        }

        $this->view('employee/employees/update', $data);;
        

    }

   


    public function approve($id){
        $this->employeeModel->approve($id);
        $this->index();


    } 
    public function notApprove($id){
        $this->employeeModel->notApprove($id);
        $this->index();

    }
    public function delete($id){
        if($this->employeeModel->deleteemployeeById($id)){
            $this->index();
        }else{
            die('Something went wrong!');
        }
        
    }
    
   

   
}