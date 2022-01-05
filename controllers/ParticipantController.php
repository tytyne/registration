<?php

require_once '../models/Participant.php';

class Participants {

    private $participantModel;
    
    public function __construct(){
        $this->participantModel = new Participant;
    }

    public function register(){
    
        {
            
            $data = [

                'PartEmail' => trim($_POST['PartEmail']),
                'PartPassword' => trim($_POST['PartPassword']),
                'pwdRepeat' => trim($_POST['pwdRepeat']),
                'PartFirstname' => trim($_POST['PartFirstname']),
                'PartLastname' => trim($_POST['PartLastname']),
                'PartGender' => trim($_POST['PartGender']),
                'PartCountry' => trim($_POST['PartCountry']),
                'PartSubscribe' => trim($_POST['PartSubscribe']),
                
               
            ];

            //confirm password
            if($data['PartPassword']!== $data['pwdRepeat']){
                echo json_encode(array('error'=>'1', 'message'=>'password do not match!'));
             }
            
            //User with the same email already exists
            else if($this->participantModel->findParticipantByEmail($data['PartEmail'])){
                echo json_encode(array('error'=>'1', 'message'=>'Email already exists'));
            }
           
            else{
   
            //Now going to hash password
            $data['PartPassword'] = password_hash($data['PartPassword'], PASSWORD_DEFAULT);
            // var_dump($data);
            if($this->participantModel->register($data)){
                echo json_encode(array('error'=>'0', 'message'=>'Registration successfully Login'));
            }
            else{
                echo json_encode(array('error'=>'1', 'message'=>'Something went wrong!')); 
            }

            }
        

        }
       
    }
}
$participants = new Participants();
$participants->register()


?>

  

    