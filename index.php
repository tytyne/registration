<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin signup</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include("partials/navbar.php")
?>
<div class="container" style="margin-top:50px">
<h1 style="text-align:center;">Admin registration Form</h1><br>
  <div class="row">
    <div class="col-md-4"></div>
      <div class="col-md-4">

        <!-- alert success and danger message--->
        <span class="message-message"></span>
        
        <form id="signupForm">
          <div class="form-group">
             <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="">
          </div>
          <div class="form-group">
             <input type="text" class="form-control" name="username" placeholder="Username" required="">
          </div>
          <div class="form-group">
             <input type="email" class="form-control" name="email" placeholder="Email" required="">
          </div>
          <div class="form-group">
             <input type="password" class="form-control" name="password" placeholder="Password" minlength="8" required="">
          </div>
          <p>If you have account <a href="loginForm.php">Login</a></p>
          <input type="submit" class="btn btn-primary btn btn-block" value="Sign Up">  
        </form>
      </div>
    </div>
  </div>
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
      $("#signupForm").on("submit",function(e){
        e.preventDefault();
      
        var formData = $(this).serialize();
        $.ajax({
            //  url : "partials/register.php",
            url : "controllers/RegisterController.php",
            type: "POST",
            cache:false,
            data: formData,
            success:function(response){
              console.log(response)
              data = JSON.parse(response);
              if (data.error == "0") {
                $("#signupForm").trigger("reset");
                $('.message-message').replaceWith('<div class="alert alert-success alert-dismissible" role="alert">'
                 + data.message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
              }else if(data.error == "1") {
               $('.message-message').replaceWith('<div class="alert alert-danger alert-dismissible" role="alert">'
                 + data.message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
              }
            }
        });
      });
  });
</script>