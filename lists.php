<?php
  session_start();
  if (!isset($_SESSION['id'])) {
      header("Location:loginForm");
  }
?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Participants Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
  
  <div class="container" style="margin-top:50px">
    <h1 style="text-align:center;">list of Participants </h1><br>
    <div class="row">
       <h5>Hello, <?php echo ucwords($_SESSION['fullname']); ?> <small><a href="logout.php">Logout</a></small></h5>   
    </div>

<div class="container mt-2">
<div class="page-header">
<h2>Participants List</h2>
</div>
<div class="row">
<div class="col-md-8">
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
include 'database/config.php';
$query="SELECT id,PartEmail,PartFirstname,PartLastname,PartGender,PartCountry from participants limit 200"; // Fetch all the data from the table customers
$result=$con->query($query);;
?>
<?php if ($result->num_rows > 0): ?>
<?php while($array=mysqli_fetch_row($result)): ?>
<tr>
<th scope="row"><?php echo $array[0];?></th>
<td><?php echo $array[1];?></td>
<td><?php echo $array[2];?></td>
<td><?php echo $array[3];?></td>
<td><?php echo $array[4];?></td>
<td><?php echo $array[5];?></td>
<td> 
<!-- <a href="javascript:void(0)" class="btn btn-primary view" data-id="<?php echo $array[0];?>">View</a> -->
</tr>
<?php endwhile; ?>
<?php else: ?>
<tr>
<td colspan="3" rowspan="1" headers="">No Data Found</td>
</tr>
<?php endif; ?>
<?php mysqli_free_result($result); ?>
</tbody>
</table>
</div>
<div class="col-md-4">
<span id="email"></span><br>
<span id="firstname"></span><br>
<span id="lastname"></span><br>
<span id="gender"></span><br>
<span id="country"></span><br>
</div>
</div>        
</div>
<script type="text/javascript">
$(document).ready(function($){
$('body').on('click', '.view', function () {
var id = $(this).data('id');
// ajax
$.ajax({
type:"POST",
url: "partials/getrecords.php",
data: { id: id },
dataType: 'json',
success: function(res){
$('#email').html(res.PartFirstname);
$('#firstname').html(res.PartFirstname);
$('#lastname').html(res.ParLastname);
$('#gender').html(res.PartGender);
$('#country').html(res.PartCountry);

}
});
});
});

  </div>
</body>
</html>