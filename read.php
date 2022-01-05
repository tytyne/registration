<?php

require_once 'controllers/ListController.php';

$parts = new ListController();

$rows = $parts->getParticipants();


?>


<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Email</th>
<th scope="col">Firstname</th>
<th scope="col">Lastname</th>
<th scope="col">Gender</th>
<th scope="col">Country</th>

</tr>
</thead>
<tbody>


<?php  
foreach ($rows as $value) {
  echo "<tr>";
  echo "<td>i</td>";
  echo "<td>$value->PartEmail</td>";
  echo "<td>$value->PartFirstname</td>";
  echo "<td>$value->PartLastname</td>";
  echo "<td>$value->PartGender</td>";
  echo "<td>$value->PartCountry</td>";
 
  echo "</tr>";
}
?>



</table>

