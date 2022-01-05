<?php
    require_once 'models/Participant.php';
    // require_once '../helpers/session_helper.php';

    class ListController {

        private $participantModel;
        
        public function __construct(){
            $this->participantModel = new Participant;
        }


        public function getParticipants(){

           $data=$this->participantModel->AllParticipants();
       
           return $data;
           

        }
       


}

// $participant = new Participants();
// $participant->getParticipants();

  

    