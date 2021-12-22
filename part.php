<?php
	// include database connectivity file

	include_once('config.php');

	if (isset($_POST['PartFirstname'])) {
		
		$PartEmail = $con->real_escape_string($_POST['PartEmail']);
		$PartPassword = $con->real_escape_string(md5($_POST['PartPassword']));
		$pwdRepeat =trim(md5($_POST['pwdRepeat']));
		$PartFirstname 	  = $con->real_escape_string($_POST['PartFirstname']);
		$PartLastname = $con->real_escape_string($_POST['PartLastname']);
		$PartGender = $con->real_escape_string($_POST['PartGender']);
		$PartCountry = $con->real_escape_string($_POST['PartCountry']);
		$PartSubscribe = $con->real_escape_string($_POST['PartSubscribe']);	
		$query = "SELECT * FROM participants WHERE PartEmail ='$PartEmail'";

		if($PartPassword!== $pwdRepeat){
            echo json_encode(array('error'=>'1', 'message'=>'password do not match!'));
         }
		
		else if($con->query($query)->num_rows > 0) { 
		// if return 1, email exist.
			echo json_encode(array('error'=>'1', 'message'=>'Email already exists'));
		} else { 
			// else not, insert to the table
			$query = "INSERT INTO participants (PartEmail, PartPassword,PartFirstname,PartLastname,PartGender,PartCountry,PartSubscribe) 
				  VALUES('$PartEmail', '$PartPassword','$PartFirstname','$PartLastname','$PartGender','$PartCountry','$PartSubscribe')";
			

			$result = $con->query($query);

			if ($result) {
				echo json_encode(array('error'=>'0', 'message'=>'Registration successfully Login'));
				// header("Location: notification.php");
				// exit();
			}
			else{
				echo json_encode(array('error'=>'1', 'message'=>'Registration Failed try again'));
			}
		  }

		
	}

?>