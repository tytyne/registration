<?php
require_once 'libraries/Database.php';

class Participant {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Find participant by email 
    public function findParticipantByEmail($PartEmail){
        $this->db->query('SELECT * FROM participants WHERE PartEmail = :PartEmail');
        $this->db->bind(':PartEmail', $PartEmail);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }


    public function AllParticipants(){
        // $this->db->query('SELECT * FROM participants');
        $query = $this->db->query('SELECT * FROM participants');
        
        $data = $this->db->resultSet();

        return $data;
    }

   


    //Register participant
    public function register($data){
        $this->db->query('INSERT INTO participants (PartEmail,PartPassword,PartFirstname,PartLastname,PartGender,PartCountry,PartSubscribe) 
        VALUES (:PartEmail, :PartPassword,:PartFirstname,:PartLastname,:PartGender,:PartCountry,:PartSubscribe)');
        //Bind values
      
        $this->db->bind(':PartEmail', $data['PartEmail']);
        $this->db->bind(':PartPassword', $data['PartPassword']);
        $this->db->bind(':PartFirstname', $data['PartFirstname']);
        $this->db->bind(':PartLastname', $data['PartLastname']);
        $this->db->bind(':PartGender', $data['PartGender']);
        $this->db->bind(':PartCountry', $data['PartCountry']);
        $this->db->bind(':PartSubscribe', $data['PartSubscribe']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    


}