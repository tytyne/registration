jQuery.validator.addMethod("noSpace", function(value, element) { 
    return value == '' || value.trim().length != 0;  
}, "No space please and don't leave it empty");
jQuery.validator.addMethod("customEmail", function(value, element) { 
  return this.optional( element ) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test( value ); 
}, "Please enter valid email address!");
$.validator.addMethod( "alphanumeric", function( value, element ) {
return this.optional( element ) || /^\w+$/i.test( value );
}, "Letters, numbers, and underscores only please" );
var $registrationForm = $('#registration');
if($registrationForm.length){
  $registrationForm.validate({
      rules:{
       
          PartEmail: {
              required: true,
              customEmail: true
          },
          PartPassword: {
              required: true,
              minStrict: 8,
              maxlength: 8
          },
          pwdRepeat: {
              required: true,
              equalTo: '#password'
          },
          PartFirstname: {
              required: true,
              noSpace: true
          },
          PartLastname: {
              required: true,
              noSpace: true
          },
          PartGender: {
              required: true
          },
          terms: {
              required: true
          },
          PartCountry: {
              required: true
          },
        
      },
      messages:{
        
          PartEmail: {
              required: 'Please enter email!',
              email: 'Please enter valid email!'
          },
          PartPassword: {
              required: 'Please enter password!',
              minStrict: 'password must have atleast 8 characters!',
              maxlength:'password must have atleast 8 characters!'
          },
          pwdRepeat: {
              required: 'Please enter confirm password!',
              equalTo: 'Please enter same password!'
          },
          PartFirstname: {
              required: 'Please enter first name!'
          },
          PartLastname: {
              required: 'Please enter last name!'
          },
          PartCountry: {
              required: 'Please select country!'
          },
        
      },
      errorPlacement: function(error, element) 
      {
        if (element.is(":radio")) 
        {
            error.appendTo(element.parents('.gender'));
        }
        else if(element.is(":checkbox")){
            error.appendTo(element.parents('.conditions'));
        }
        else 
        { 
            error.insertAfter( element );
        }
        
       }
  });
}