
<!DOCTYPE html>
<html>
 <head>
    <title>Registration</title>
        <link rel="stylesheet" type = "text/css " href= "CSS/stylesheet reg.css">
        <link rel="stylesheet" type = "text/css " href= "CSS/Footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nova+Mono">
<script src="js/validation.js"></script>
<style>
.error {
  font-size: 10px;
  color: #FF0000;
display: inline-block;
margin:0;
padding: 0;}
</style>

 </head>
 <body>

        <div>
                <div class="logo"><a href="Homepage.html"><img src="Pictures/LOGO.png" alt="logo"></a></div>
                <div class="login-form-1">
                    <form id="register-form" class="text-left" action="register.php" method="post">
                        <div class="login-form-main-message"></div>
                        <div class="main-login-form">
                            <div class="login-group">

                                <div class="form-group">
                                    <label for="fname" >First name</label>
                                    <p id="err_fname" class="error"></p>
                                    <input type="text" class="form-control" id="per_fname" name="fname" placeholder="first name" onblur="validate('fname', this.value);">
                                </div>
								 <div class="form-group">
                                    <label for="lanme" >Last name</label>
                                    <p id="err_lname" class="error"></p>
                                    <input type="text" class="form-control" id="per_lname" name="lname" placeholder="last name" onblur="validate('lname', this.value);">
                                </div>
                                <div class="form-group">
                                    <label for="pass1" >Password</label>
                                    <p id="err_pass1" class="error"></p>
                                    <input type="password" class="form-control" id="pass1" name="pass1" placeholder="password" onblur="validate('pass1', this.value);">
                                </div>
                                <div class="form-group">
                                    <label for="pass2" >Password Confirm</label>
                                    <p id="err_pass2" class="error"></p>
                                    <input type="password" class="form-control" id="pass2" name="pass2" placeholder="confirm password" onblur="compare(this.value,document.getElementById('pass1').value);">
                                </div>

                                <div class="form-group">
                                    <label for="email" >Email</label>
                                    <p id="err_email" class="error"></p>
                                    <input type="text" class="form-control" id="per_email" name="email" placeholder="email" onblur="validate('email', this.value);">
                                </div>
								                    <div class="form-group">
                                    <label for="phone" >phone number</label>
                                    <p id="err_phone" class="error"></p>
                                    <input type="text" class="form-control" id="per_phone" name="phone" placeholder="number" onblur="validate('phone', this.value);">
                                </div>

                            </div>
                            <button type="submit" name="register" class="login-button" onclick="return checkRegForm()"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <div class="etc-login-form">
                            <p>already have an account? <a href="login.php">login here</a></p>
                        </div>
                    </form>
                </div>
            </div>



<script>
function checkRegForm(){
  alert("here!");
   var fname = document.getElementById("per_fname").value;
   var lname = document.getElementById("per_lname").value;
   var phone = document.getElementById("per_phone").value;
   var email = document.getElementById("per_email").value;
   var pass1 = document.getElementById("pass1").value;
   var pass2 = document.getElementById("pass2").value;
   if(fname === '' || lname === '' || phone === '' || pass1==='' || pass2==='' || email===''){
    alert("Please complete all fields");
    return false;
   } 
   else{
    var errfname = document.getElementById("err_fname").innerHTML.trim();
    var errlname = document.getElementById("err_lname").innerHTML.trim();
    var errphone = document.getElementById("err_phone").innerHTML.trim();
    var errpass1 = document.getElementById("err_pass1").innerHTML.trim();
    var errpass2 = document.getElementById("err_pass2").innerHTML.trim();
    var erremail = document.getElementById("err_email").innerHTML.trim();
   if (erremail !== "" && errfname !== "" && errlname !== "" && errphone !== "" && errpass1 !== '' && errpass2 !=='') {
    alert("Please complete all fields with in required format");
    return false;
    }
    else {
        var conf = confirm("Confirm information?");
         if (conf === true){
            return true;
            } 
         else {
             return false;   
              }
     }
  }
}
</script>



 </body>
</html>