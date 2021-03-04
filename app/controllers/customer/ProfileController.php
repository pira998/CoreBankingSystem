<?php
class Profile extends Controller {
    public function __construct() {
        $this->customerModel = $this->model('Customer');
        $this->onlineProfileModel = $this->model('OnlineProfile');
    }

    // customer(controller)/profile(file)/index(method)/14(params)
    //public function index(14){}
    public function index($id) {
        
        $onlineAccountInfo = $this->onlineProfileModel->getOnlineAccountInfo($id);
        $isIndividualCustomer = $this->customerModel->isIndividualCustomer( $onlineAccountInfo->customer_id );
        if ( $isIndividualCustomer ) {
            $info = $this->customerModel->getIndividualCustomerInfo(  $onlineAccountInfo->customer_id );
        } else {
            $info = $this->customerModel->getOrganizationalCustomerInfo(  $onlineAccountInfo->customer_id);
        }


        $data = [
            'online_account_info'=> $onlineAccountInfo,
            'customer_info' => $info

        ];


        $this->view('customer/profile/index', $data);
    }
    
    public function update($id){

       $onlineAccountInfo = $this->onlineProfileModel->getOnlineAccountInfo($id);
        $isIndividualCustomer = $this->customerModel->isIndividualCustomer( $onlineAccountInfo->customer_id );
        if ( $isIndividualCustomer ) {
            $info = $this->customerModel->getIndividualCustomerInfo(  $onlineAccountInfo->customer_id );
        } else {
            $info = $this->customerModel->getOrganizationalCustomerInfo(  $onlineAccountInfo->customer_id);
        }

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
                'customer_id'=>$_SESSION['customer_id'],
                'address'=> ($_POST["address"]),
               
                
                
            ];

           
            if ($this->customerModel->updateProfile($data)) {
                    $this->index($id);
            } else {
                die("Something went wrong, please try again!");
            }
        }

        

    }
    

    public function about() {
        $this->view('about');
    }
    public function register() {
        $data = [
            'username' => '',
            'nic' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'customerIdError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'username' => trim($_POST['username']),
                'customer_id' => trim($_POST['customer_id']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters and numbers.';
            }
            if ($this->onlineProfileModel->findCustomerByUsername($data['username'])) {
            $data['usernameError'] = 'username is already taken.';
            
            }
            if ($this->onlineProfileModel->findCustomerByCustomerID($data['customer_id'])) {
                $data['customerIdError'] = 'Customer ID is already taken.';
            }

            //Validate email
            // if (empty($data['email'])) {
            //     $data['customerIdError'] = 'Please enter email address.';
            // } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            //     $data['customerIdError'] = 'Please enter the correct format.';
            // } else {
            //     //Check if email exists.
            //     if ($this->onlineProfileModel->findUserByEmail($data['customer_id'])) {
            //     $data['customerIdError'] = 'Email is already taken.';
            //     }
            // }

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 6){
              $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['usernameError']) && empty($data['customerIdError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                If(!$this->onlineProfileModel->findCustomerByCustomerID($data['customer_id'])){
                    if ($this->onlineProfileModel->register($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/customer/profile/login');
                    } else {
                    die('Something went wrong.');
                }
                }
                
            }
        }
        $this->view('users/register', $data);
    }
    
    public function login() {
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
            //Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->onlineProfileModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';

                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['online_account_id'] = $user->online_account_id;
        $_SESSION['customer_id'] = $user -> customer_id;
        $_SESSION['username'] = $user->username;
        $_SESSION['role'] = "customer";
        header('location:' . URLROOT . '/customer/index');
    }

    public function logout() {
        unset($_SESSION['customer_id']);
        unset($_SESSION['username']);
        unset($_SESSION['online_account_id']);
        unset($_SESSION['role']);

        header('location:' . URLROOT . '/customer/profile/login');
    }


}
