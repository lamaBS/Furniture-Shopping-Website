
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
                          <a href="addCat.php" class="active">ADD CATIGORY<span class="glyphicon glyphicon-heart pull-right"></span></a>
                      </li>
                     <li>
                          <a href="sittingPass.php">SITTING<span class="glyphicon glyphicon-heart pull-right"></span></a>
                      </li>

                    </div>

                </ul>
          </div>

            <div class="content">
              <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">ADD CATIGORY </div>
                   
                    </div>
                   &nbsp; &nbsp; 
       <div style="position: relative; top: 120px; left: 190px;">
       <form  method="post">
        <br>
         <label style="color:#cc9900;font-family: 'Nova Mono', sans-serif; "> Please Enter The Name of The New Carigory :<br><br>
          <input type="text" name="name" onfocus="this.value=''" value="" size="35%"style="color:#F5B041; font-family: Arial; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;" required></label> 
<br>
<br>
 <button name="submit" style="left: 400px; font-size: 20px;padding:10px; font-size: 15px; border-radius:7px; color:white; background-color: #cc9900; left: 300px; position: relative;" onclick="return confirm('Are you sure you want to ADD??');">ADD</button> 
  <button name="" type="reset" style="left: 400px; font-size: 20px;padding:10px; font-size:15px; border-radius:7px; color:white; background-color: #cc9900; left:303px; position: relative;">Cancel</button>
<br>
<br>
<br>
        </form>
<?php

$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$conn = mysqli_connect($servername, $username, $password);
$coon=mysqli_select_db($conn,"fortuners");
// Check connection
if (!$coon) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST["submit"])){



$sql = "INSERT INTO category (name)
VALUES ('".$_POST['name']."')";

if ($conn->query($sql) === TRUE) {
    echo "<p style='color:red; font-size:19px;'>" .$_POST["name"]." inserted successfully !</P>";
} else {
   die(" <p style='color:red; font-size:19px;'> Error inserting Category : " . $conn->error."</p>") ;
}}

$conn->close();
?>













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
