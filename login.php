<?php
session_start();
include 'db.php';
if(isset($_POST['submit']))
{
	if (empty($_POST['reg_email']) || empty($_POST['reg_password']) || empty($_POST['reg_type'])) {

 echo "<script> alert('fill all fields please!!');</script>";}
										
		
		
	else{
			 $usertype=$_POST['reg_type'];								
			$email = $_POST['reg_email'];
			$password = $_POST['reg_password'];

    $stmt = $conn->prepare("SELECT * FROM `".$usertype."`  WHERE `Email`=? AND `password`=? LIMIT 1");
    $stmt->bind_param('ss',$email, $password);
    if($stmt)
    {
       $stmt->execute();
       $stmt->store_result();
        if($stmt->num_rows == 1)  //To check if the row exists
        {
           $_SESSION['Logged'] = 1;
           $_SESSION['email'] = $email;
           // if login success then redirect the user to the main page
           header('Location: Homepage.php');
       }
       else {
        echo "<script> alert('wrong password or email !!');</script>";
    }

}}}






?>
<!DOCTYPE html>
<html>
 <head>
    <title>Login</title>
        <link rel="stylesheet" type = "text/css " href= "CSS/stylesheet login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nova+Mono">



 </head>

 <body>

        <div class="text-center" style="padding:50px 0">
                <div class="logo"><a href="Homepage.html"><img src="Pictures/LOGO.png" alt="logo"></a></div>
                <div class="login-form-1">
                    <form id="register-form" class="text-left" action="login.php" method="post">
                        <div class="login-form-main-message"></div>
                        <div class="main-login-form">
                            <div class="login-group">

                                <div class="form-group">
                                    <label for="reg_username" >Email : </label>
                                    <input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="reg_password" >Password : </label>
                                    <input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password">
                                </div>
								   <div class="form-group login-group-checkbox">
                          
                                    <input type="radio" class="form-control" name="reg_type" value="admin" id="admin" >
                                    <label for="admin">admin</label>
                                    <input type="radio" class="form-control" name="reg_type" value="customer" id="customer" >
                                  <label for="customer">user</label>
                                </div>

                            </div>

                            <button type="submit" name="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <div class="etc-login-form">
                           
                        </div>
                    </form>
                </div>
            </div>






 </body>
</html>