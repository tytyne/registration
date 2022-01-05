<?php

require_once 'controllers/ListController.php';

$parts = new ListController();

$rows = $parts->getParticipants();


?>

<table border='1'>

<tr>

<th>Email</th>

<th>Firstname</th>

<th>Lastname</th>

<th>Gender</th>

</tr>


<?php  
foreach ($rows as $value) {
  echo "<tr>";
  echo "<td>$value->PartEmail</td>";
  echo "<td>$value->PartFirstname</td>";
  echo "<td>$value->PartLastname</td>";
  echo "<td>$value->PartGender</td>";
  echo "</tr>";
}
?>



</table>

