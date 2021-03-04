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
     
            'username' => '',            
            'name'=>'',
      
            'address' => '',           
        
            'nic' => '',       
            'password' => '',        
       
            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                'username' => trim($_POST['username']),
                'name' => trim($_POST['name']),
                
                'address' => trim($_POST['address']),
                'phone_number' => trim($_POST['phone_number']),
       
                'nic' => trim($_POST['nic']),
                'password' => trim($_POST['password']),


            ];
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT); 
            if ($this->employeeModel->register($data)) {
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
            'email'=> '',
            'address'=> '',
        
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'info' => $info,
       
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