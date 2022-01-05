<?php

require_once '../models/Admin.php';

class admins {

    private $adminModel;
    
    public function __construct(){
        $this->adminModel = new Admin;
    }

    public function register(){
    
        {
            $data = [

                'username' => trim($_POST['username']),
                'fullname' => trim($_POST['fullname']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
               
            ];
            
            //User with the same email already exists
            if($this->adminModel->findUserByEmailOrUsername($data['email'])){
                echo json_encode(array('error'=>'1', 'message'=>'Email already exists'));
            }
            if($this->adminModel->findUserByEmailOrUsername($data['username'])){
                echo json_encode(array('error'=>'1', 'message'=>'Username already exists'));
            }
            else{
            //Now going to hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            // var_dump($data);
            if($this->adminModel->register($data)){
                echo json_encode(array('error'=>'0', 'message'=>'Registration successfully Login'));
            }
            else{
                echo json_encode(array('error'=>'1', 'message'=>'Something went wrong!')); 
            }

            }
        

        }
       
    }
}
$admins = new Admins();
$admins->register()


?>