<?php
  session_start();
    require_once '../models/Admin.php';
    require_once '../helpers/session_helper.php';

    class Users {

        private $adminModel;
        
        public function __construct(){
            $this->adminModel = new Admin;
        }

      
    public function login(){

      
        //Init data
        $data=[
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password'])
        ];

    
        //Check for user/email
        if($this->adminModel->findUserByEmailOrUsername($data['email'])){
            //User Found
            $loggedInUser = $this->adminModel->login($data['email'], $data['password']);
              //Create session
            $this->createUserSession($loggedInUser);
            if($loggedInUser){
          
                echo 1;
                // redirect("../lists.php");

            }else{
                echo 0;
            }
        }
    }
    public function createUserSession($user){
        $_SESSION['id'] = $user->id;
        $_SESSION['fullname'] = $user->fullname;
    
    }
   

   
}

    $users = new Users;
    $users->login();
    
    
?>

    