<?php

    include 'isLogged.php';
    ?>




<html>

<head>
<title>My Account | FORTUNERS</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nova+Mono">
<link href="CSS/Personal_navigationbar.css" rel="stylesheet" type="text/css">
<style type="text/css">
span{
    font-weight: normal;
  }
</style>
</head>
<body>
<?php include 'Personal_header.php';?>
<div class="navigationbar">
<div class="container">
	<div class="row">
		<div class="wrapper">
    	    <div class="side-bar">

            <ul>
              <li class="menu-head"><h3> MY ACCOUNT</h3></li>
              <div class="menu">
                <li>
                  <a  href ="Personal_info.php">INFORMATION</a>
              </li>
                <li>
                    <a class="active">ADDRESS BOOK</a>
                </li>  <li>
                      <a href ="Personal_Payment.php">PAYMENT</a>
                  </li>
                <li>
                    <a href ="Personal_Password.php">PASSWORD</a>
                </li>
                <li>
                    <a href ="Personal_orders.php">ORDERS</a>
                </li>

                    </div>

                </ul>
    	    </div>

            <div class="content">
              <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">ADDRESS BOOK</div>
                     <div class="panel-body">
                      <h3>Addresses:</h3><br><br>
                      <?php
    $email = $_SESSION['email'];
    $con= mysqli_connect('localhost','root','');
    mysqli_select_db($con,"fortuners");
    if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }
   if(!$con) {
     die("Unable to select database");
   }
  else{

    $query = " SELECT * FROM address WHERE email='$email';";
    $result = mysqli_query($con,$query);
    if($result->num_rows!=0){
      while($rows=$result->fetch_assoc()){
        $id=$rows['addressID'];
        $country=$rows['country'];
        $city= $rows['city'];
        $postal= $rows['postalCode'];
        $street= $rows['street'];
        $bnum= $rows['buildingNo'];
        echo"
        <div class='container'>
          <div class='address'>
            <label>COUNTRY</label>
            <span class='country'> $country </span><br>

            <label>CITY</lable>
            <span class='city'> $city </span><br>

            <label>POSTAL CODE</label>
            <span class='postal'> $postal </span><br>

            <label for='street'>STREET</label>
            <span class='street'> $street </span><br>

            <label for='building'>BUILDING NO.</label>
            <span class='building'> $bnum </span><br>

            <span class='manage'>
            <a href='' onclick='deleteAddress($id)'><img class='delete' src='Pictures/trash.png'  alt='delete'></a>
            <a href='Personal_editAddress.php?id=$id'><img class='edit' src='Pictures/edit.png'  alt='Edit'></a>
            </span>
          </div>
        </div>
        ";
      }
    }
    else{
      echo"NO ADDRESSES WERE FOUND.";}
    }
   ?>


<div class="container" style="border-color: transparent">
<a href="Personal_addAddress.php"><input type="button" class="button" value="ADD NEW ADDRESS"/></input></a>
</div>
                     <!--end of content-->
                    </div>
                </div>
            </div>
          </div>
	</div>
</div>
</div>
</div>
</div>
<?php include 'footer.html';?>
<script>
  function deleteAddress(id){
    var conf = confirm("Delete address?");
    if (conf == true) {
      var xmlhttp;
try{
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
 else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
xmlhttp.open("GET", "deleteAddress.php?id=" + id, false);
xmlhttp.send();
window.location.href=window.location.href;
}

catch(exception){
    alert("Request failed, Please try again.");
    }
 }
}
    </script>
  }
</body>
</html>
