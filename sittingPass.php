
<html>

<head>
<title>My Account | Home</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Nova+Mono">
<link href="CSS/Header.css" rel="stylesheet" type="text/css">
<link href="CSS/Footer.css" rel="stylesheet" type="text/css">
<link href="CSS/admin_NavigationBar.css" rel="stylesheet" type="text/css">
<link href="CSS/sitting.css" rel="stylesheet" type="text/css">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


  
</head>
<?php include_once 'personal_header_admin.php';?>



<div class="navigationbar">
<div class="container">
	<div class="row">
		<div class="wrapper">
    	    <div class="side-bar">

                <ul>
                          <li class="menu-head">
                      ADMIN ACCOUNT <a href="#" class="push_menu"><span class="glyphicon glyphicon-align-justify pull-right"></span></a>
                    </li>
                    <div class="menu">
       <li>
                          <a href="adminPage.php">HOME <span class="glyphicon glyphicon-dashboard pull-right"></span></a>
                      </li>
                      <li>
                          <a href="viewReport.php"> VIEW REPORT <span class="glyphicon glyphicon-dashboard pull-right"></span></a>
                      </li>
                        <li>
                            <a href="addProduct.php" >ADD PRODUCT<span class="glyphicon glyphicon-heart pull-right"></span></a>
                        </li>
                      <li>
                          <a href="addCat.php" >ADD CATIGORY<span class="glyphicon glyphicon-heart pull-right"></span></a>
                      </li>
                     <li>
                          <a href="sittingPass.php" class="active">SITTING<span class="glyphicon glyphicon-heart pull-right"></span></a>
                      </li>
                     

                    </div>

                </ul>
    	    </div>

            <div class="content">
              <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">SITTING PAGE</div>
                   
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
				<div class="container">

 <ul class="nav-nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li id="1"><a data-toggle="tab"  style="font-size:20px;" href="sittingPass.php" ">&nbsp; &nbsp; PassWord</a></li>
    <li id="2"><a data-toggle="tab"  style="font-size:20px;" href="sittingEmail.php" >Email</a></li>
     <li id="3"><a data-toggle="tab"  style="font-size:20px;" href="sittingPhone.php">PhoneNumber</a></li>
     <li id="3"><a data-toggle="tab"  style="font-size:20px;" href="sittingName.php">Name Change </a></li>
  </ul>

					
					
					
                </div>
                <br>
                <br>
                <br>
                <div class="foor" style="border:dotted;color:#cc9900;">
                <form method="POST"><br>
                <br>
                <div class="oldPassword">
                  <label>Please Enter Old Password :</label><br>
                  <input  name="old" type="Password" value="" size="35%" required>
                  <br><br>
                  <label>Please Enter New Password :</label><br>
                  <input  name="new" type="Password" value="" size="35%"  required>
                  <br><br>
                  <label>Please reEnter New Password :</label><br>
                  <input name="renew" type="Password" value="" size="35%"  required>
                            <button id="1" name="submit" type="submit" onclick="return confirm('Are you sure you want to Change??');">Conform</button>
</form>
<br>
<br>
<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$coon=mysqli_select_db($conn,"fortuners");
if(isset($_POST["submit"])){
  $old = $_POST["old"];
  $newpass = $_POST["new"];
  $newrepass = $_POST["renew"];

  if($newpass !== $newrepass)
    die("<p style='color:red; font-size:20px;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;The pass word you enter are not match!</p>") ;

$sqlCheck = "SELECT  password  FROM  admin  WHERE 1 ;";
$resultCheck = mysqli_query($conn,$sqlCheck);
 $row=mysqli_fetch_assoc($resultCheck);
$check = $row['password'];
if($check !== $old)
   die("<p style='color:red; font-size:20px;'> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; The password you enter is not corect!</p>") ;

$sql = "UPDATE admin SET password ='$newpass' WHERE `password`='$old';";
$result = mysqli_query($conn,$sql);

if($result)
echo "<p style='color:red; font-size:20px;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; The password is Updated</p> ";
}//submit if
else
{die(" <p style='color:red; font-size:20px;'>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Error !! </p>");}
?>

</div>





                </div>
            </div>

		</div>
	</div>
</div>
</div>


<footer class="footer">
  <p id="about"><p><a href="mailto:Fortuners@admin.com">Email us</a>
  Follow us <a href="#" class="fa fa-twitter"></a><a href="#" class="fa fa-instagram"></a></p>
   <p> &copy; 2018 </p>

   </footer>
</div>








</body>
</html>
