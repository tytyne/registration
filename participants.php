<!DOCTYPE html>
<html lang="en">
<head>
  <title>Participant Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  	.error{
    	color: red;
        font-style: italic;
    }
  </style>
</head>
<body class="body">
<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6 trial">
            <div class="card px-5 py-5 trial">
             <!-- alert success and danger message--->
             <span class="message-message"></span>
                <h4 class="mt-3">Responsive Registration</br> <span id ="form2">Form</span></br></h4> 
            
                
                    <!-- form -->
                	<form id = "registration">
                   
                        <div class="form-input"><i class="fa fa-envelope"></i><input type = "text" class = "form-control" name = "PartEmail" placeholder = "Email" required=""></div>
                   
                        <div class="form-input"><i class="fa fa-lock"></i><input type = "password" class = "form-control" name = "PartPassword" placeholder = "Password" id = "password" minlength="8" required=""></div>
                   
                        <div class="form-input"><i class="fa fa-lock"></i><input type = "password" class = "form-control" name = "pwdRepeat" placeholder = "Re-type Password"  required=""></div>
                      
                        <div class="row align-items-center g-3">
                        <div class="col-6">
                        <div class="form-input"><i class="fa fa-user"></i><input type = "text" class = "form-control" name = "PartFirstname" placeholder = "First Name"  required=""></div>
                        </div>
                      
                        <div class="col-6">
                        <div class="form-input"><i class="fa fa-user"></i><input type = "text" class = "form-control" name = "PartLastname" placeholder = "Last Name"  required=""></div>
                        </div>
                        </div>
                   
                        <div class = "gender" required="">
                        <label class="radio-inline"><input type="radio" name="PartGender" value="male" class = "form-contorl" checked/>Male</label>
                        <label class="radio-inline"><input type="radio" name="PartGender" value="female" class = "form-contorl" />Female</label>       
                        </div> 
                        <br/>
                        <select class = "form-control form-select-lg mb-2" name = "PartCountry" required>
                          <option value="">Select a Country</option>
                            <option value="kenya">Kenya</option>
                            <option value="uganda">Uganda</option>
                            <option value="rwanda">Rwanda</option>
                        </select>

                        <div class = "conditions" >
							          <label class="checkbox-inline"><input type="checkbox" name = "terms" required="">I agree with  terms and conditions</label>	
                        </div>
                        <div class="form-check"> 
                        <input class="form-check-input" type="checkbox" value="true" id="flexCheckChecked" name="PartSubscribe"  checked=1> <label class="form-check-label"  for="flexCheckChecked"> I want to receive the newsletter</label> 
                        </div> 
                        </br>
                        <div class="d-grid gap-2">
                        <button class="btn btn-warning" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script src="register.js"></script>   -->

</body>
</html>
<script type="text/javascript">

    
  $(document).ready(function(){
      $("#registration").on("submit",function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url : "part.php",
            type: "POST",
            cache:false,
            data: formData,
            success:function(response){
              data = JSON.parse(response);
              if (data.error == "0") {
                $("#registration").trigger("reset");
                // $('.message-message').replaceWith('<div class="alert alert-success alert-dismissible" role="alert">'
                //  + data.message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                window.location.replace("notification");
              }else if(data.error == "1") {
               $('.message-message').replaceWith('<div class="alert alert-danger alert-dismissible" role="alert">'
                 + data.message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
              }
            }
        });
      });
  });
</script>
