
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
    <li id="1"><a data-toggle="tab"  style="font-size:20px;" href="sittingPass.php">&nbsp; &nbsp; PassWord</a></li>
    <li id="2"><a data-toggle="tab"  style="font-size:20px;" href="sittingEmail.php">Email</a></li>
     <li id="3"><a data-toggle="tab"  style="font-size:20px;" href="sittingPhone.php">PhoneNumber</a></li>
      <li id="3"><a data-toggle="tab"  style="font-size:20px;" href="sittingName.php">Name Change </a></li>
  </ul>

          
          
          
                </div>
                <br>
                <br>
                <br>
                <div class="foor" style="border:dotted;color:#cc9900;">
                <form method="post"><br>
                <br>
                <div class="oldPassword">
                  <label>Old Name  :</label><br>
                  <br>
                  <?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$coon=mysqli_select_db($conn,"fortuners");
$sqlCheck2 = "SELECT  First_name  FROM  admin  WHERE 1 ;";
$resultCheck2 = mysqli_query($conn,$sqlCheck2);
 $row2=mysqli_fetch_assoc($resultCheck2);
$check2 = $row2['First_name'];
                 echo"<input type='text' value=' &nbsp;$check2' size='35%' style='background-color:#F6F6F6;' readonly>";
                echo " &nbsp; &nbsp; &nbsp; &nbsp;";
                 ?>
                  <input type="text" value="" name="new" size="35%"  required>
                  <br><br>
                  <?php 
                  $sqlCheck2 = "SELECT  Last_name  FROM  admin  WHERE 1 ;";
$resultCheck2 = mysqli_query($conn,$sqlCheck2);
 $row2=mysqli_fetch_assoc($resultCheck2);
$check2 = $row2['Last_name'];
                 echo"<input type='text' value=' &nbsp;$check2' size='35%' style='background-color:#F6F6F6;' readonly>";
                echo " &nbsp; &nbsp; &nbsp; &nbsp;";
                 ?>
                  <input type="text" value="" name="newL"  size="35%"  required>
                  <br>
                  <br>
       <button id="1" name="submit" type="submit" style="position:relative;left:750px;" onclick="return confirm('Are you sure you want to Change??');">Conform</button>
</form>
<br>
<br>

<?php

if(isset($_POST["submit"])){

$new = $_POST["new"];
$newLast = $_POST["newL"];
 

$sql = "UPDATE admin SET First_name ='$new' WHERE 1;";
$result = mysqli_query($conn,$sql);
if(!$result){

  die("<p style='color:red; font-size:20px;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;There is some problim</p> ") ;
}
$sql4 = "UPDATE admin SET Last_name ='$newLast' WHERE 1;";
$result2 = mysqli_query($conn,$sql4);
if(!$result2){

  die("<p style='color:red; font-size:20px;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;There is some problim</p> ") ;
}

  echo "<p style='color:red; font-size:20px;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; The Name is Updated</p> ";


}//submit if
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
