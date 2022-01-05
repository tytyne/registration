<?php
require_once '../libraries/Database.php';

class Admin {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Find admin by email or username
    public function findUserByEmailOrUsername($email){
        $this->db->query('SELECT * FROM admins WHERE  email = :email OR username=:email');
        $this->db->bind(':email', $email);
      

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    //Register Admin
    public function register($data){
        $this->db->query('INSERT INTO admins (username,fullname, email,password) 
        VALUES (:username,:fullname, :email, :password)');
        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':fullname', $data['fullname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
      //Login user
      public function login($Email, $password){
        $row = $this->findUserByEmailOrUsername($Email);

        if($row == false) return false;

        $hashedPassword = $row->password;
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }


}