<?php
    include 'isLogged.php';
    ?>
<html>

<head>
<title>My Account | FORTUNERS</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nova+Mono">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="CSS\Personal_password.css" rel="stylesheet" type="text/css">
<link href="CSS\Personal_navigationbar.css" rel="stylesheet" type="text/css">
<script src="js\validation.js"></script>

</head>
<body>

<?php include 'personal_header.php';?>

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
                    <a href ="Personal_AddressBook.php">ADDRESS BOOK</a>
                </li>  <li>
                      <a href ="Personal_Payment.php">PAYMENT</a>
                  </li>
                <li>
                    <a class="active">PASSWORD</a>
                </li>
                <li>
                  <a href ="Personal_orders.php">ORDERS</a>
              </li>

                    </div>

                </ul>
    	    </div>
<div class="password">
  <div class="content">
    <div class="col-md-12">
                     <div class="panel-heading">PASSWORD</div>
                     <div class="panel-body">
                       <h3>Change Password</h3>
                       <div class="col-sm-12">
                       <text style="font-size:15px">*Enter matching passwords<text>
                     </div>
                    <p>*Your password should include:</p>
                       <div class="col-sm-6">
                         <ul>
                         <li>8 Characters menimum</li>
                        <li>One Uppercase Letter</li>
                        <li>One Lowercase Letter</li>
                        <li>One Number</li>
                       </div>

                       </div>
                       <form method="post" id="passwordForm" action="updatePassword.php">

                       <input id="pass1" type="password" name="pass1" placeholder="New Password" onblur="validate('pass1', this.value);" autocomplete="off"><br><br>
                      <input id="pass2" type="password" name="pass2" placeholder="Repeat Password" onblur="compare(this.value,document.getElementById('pass1').value);" autocomplete="off"><br>
                       <span id="err_pass1" class="error" ></span>

                      <br> <input type="submit" class="button" value="CHANGE PASSWORD" onclick="return checkPassForm()">
                       </form>
                     </div>
                     </div>
                    </div>
                </div>
<!--content-->

            </div>
		</div>
	</div>
</div>
</div>
<?php include 'footer.html';?>
<script>
  $('form').find('input').keypress(function(e){
    if( e.which==13) // Enter key = keycode 13
    {
        $(this).next().focus();  //Use whatever selector necessary to focus the 'next' input
        return false;
    }
});
  </script>
</body>
</html>
