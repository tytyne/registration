<?php

include_once('config.php');
/* SQL query to get results from database */
$id = $_POST['id'];
$query="SELECT id,PartEmail,PartFirstname,PartLastname,PartGender,PartCountry from participants WHERE id = '" . $id . "'";
$result = mysqli_query($dbCon,$query);
$cust = mysqli_fetch_array($result);
if($cust) {
echo json_encode($cust);
} else {
echo "Error: " . $sql . "" . mysqli_error($dbCon);
}


?>