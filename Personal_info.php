<?php

    include 'isLogged.php';
    $email = $_SESSION['email'];
    $con= mysqli_connect('localhost','root','');
mysqli_select_db($con,"fortuners");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: ".mysqli_connect_error();
  }
  if(!$con) {
  die("Unable to select database");
  }
else{

    $query = " SELECT * FROM CUSTOMER WHERE email='$email';";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result);
    $email = $row['Email'];
    $fname = $row['First_name'];
    $lname = $row['Last_name'];
    $phone = $row['phoneNumber'];
}
?>

<html>

<head>
<title>My Account | FORTUNERS</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nova+Mono">
      <link href="CSS\Personal_navigationbar.css" rel="stylesheet" type="text/css">
     <script src="js\validation.js"></script>
</head>
<body>

<?php include 'personal_header.php';?>

<div class="navigationbar"><!--1-->
<div class="container"><!--2-->
	<div class="row"><!--3-->
		<div class="wrapper">
    	    <div class="side-bar"><!--4-->

            <ul>
              <li class="menu-head"><h3> MY ACCOUNT</h3></li>
              <div class="menu">
                <li>
                  <a  class="active">INFORMATION</a>
                </li>
                <li>
                    <a href ="Personal_AddressBook.php">ADDRESS BOOK</a>
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
                     <div class="panel-heading">INFORMATION</div>
                     <div class="panel-body">
                      <div class="address">
                       <form id="personal_info_form" class="info" method="POST" name="personal_info_form" action="UpdateInfo.php">
                        <div>
                       <label for="email">  E-mail</label>
                          <input id="per_email" type="email" name="email" value=
                          "<?php
                         echo"$email";
                          ?>"
                          style="background-color: #f6f6f6" readonly><br>
                        </div>
                        <div>
                         <label for="fname">First Name</label>
                         <input id="per_fname" type="text" name="fname" onblur="validate('fname', this.value);" value=
                         "<?php
                         echo"$fname";
                          ?>"
                          maxlength="20">
                          <span id="err_fname" class="error"></span>
                       </div>
                       <div>
                        <label for="lname">Last Name</label>
                          <input id="per_lname" type="text" name="lname" onblur="validate('lname', this.value)" value=
                          "<?php
                         echo"$lname";
                          ?>"
                           maxlength="20">
                          <span id="err_lname" class="error"></span>
                        </div>
                        <div>
                      <label for="phone">Phone Number</label>
                          <input id="per_phone" type="tel" name="phone" onblur="validate('phone', this.value)" value=
                          "<?php
                         echo"$phone";
                          ?>"
                           maxlength="14" placeholder="009xxxxxxxxxxx">
                          <span id="err_phone" class="error"></span>
                        </div>
						              <input type="submit" name="updateinfo" class="button"  style="margin-bottom: 100px" onclick="return checkInfoForm()" value="UPDATE" ></input>


                      </form>



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
  $('form').find('input').keypress(function(e){
    if( e.which==13)
    {
        $(this).next().focus();
        return false;
    }
});


  </script>
</body>
</html>
