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
    <div class="col-lg-12">
				<div id="message"></div>
				<div id="fetch"></div>
		</div>
</div>
</body>
</html>
<script>
 

function fetch(){
      
      $.ajax({
        url: 'read.php',
        type: 'post',
        success: function(response){
          $('#fetch').html(response);
        }
      });
    }

fetch();
 
</script>
