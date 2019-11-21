<?php

    include 'isLogged.php';
    ?>
<html>

<head>
<title>My Account | FORTUNERS</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nova+Mono">
      <link href="CSS\Personal_navigationbar.css" rel="stylesheet" type="text/css">
            <link href="CSS\Personal_Payment.css" rel="stylesheet" type="text/css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
                      <a class="active">PAYMENT</a>
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
                     <div class="panel-heading">PAYMENT</div>
                     <div class="panel-body"><!--content-->
                      <h3>Payment Methods:</h3><br><br>
                      <div class="payment">

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
    $query = " SELECT * FROM payment WHERE email='$email';";
    $result = mysqli_query($con,$query);
    if($result->num_rows!=0){
      while($rows=$result->fetch_assoc()){
        $id=$rows['paymentID'];
        $cname=$rows['Name'];
        $cnum=$rows['cardNumber'];
        $expm= $rows['expDate_month'];
        $expy= $rows['expDate_year'];

echo"
<div class='container method'>
<img class='icon' src='Pictures/credit.png'></img>
<p><label for='cardname'>Name On Card:</label>
<span class=cardname>$cname</span></p>
<p><label for='cardNum'>Card Number:</label>
<span class='cardNum'>$cnum</span></p>
<label>Exp Date:</label>
<span class=expm>$expm / </span><span class=expy>$expy</span>

<input type='image' src='Pictures/trash.png' class='delete' alt='Delete' align='right' onclick='deletePayment($id)' ></input>
</div>";
}
}
else{
  echo"NO PAYMENT METHODS WERE FOUND.";}
}
?>

<div class="container" style="border-color: transparent">
<a href="Personal_addPayment.php"><input type="button" class="button" value="ADD NEW PAYMENT METHOD"/></input></a>
</div>
<article Style="font-size:12px">Due to security reasons, If card information update is needed, please delete the card with previous information and add a new payment method with the new once through the button above.</article>

</div>
<!--end content-->
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
  function deletePayment(id){
    var conf = confirm("Delete payment method?");
    if (conf == true) {
      var xmlhttp;
try{
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
 else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
xmlhttp.open("GET", "deletePayment.php?id=" + id, false);
xmlhttp.send();
window.location.href=window.location.href;
}

catch(exception){
    alert("Request failed, Please try again.");
    }
 }
}
    </script>
</body>
</html>
