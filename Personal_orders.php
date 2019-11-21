<?php

    include 'isLogged.php';
    ?>
<html>

<head>
<title>My Account | FORTUNERS</title>
<!--status bar-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Nova+Mono">
      <link href="CSS/Personal_Orders.css" rel="stylesheet" type="text/css">
      <link href="CSS/Personal_navigationbar.css" rel="stylesheet" type="text/css">
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
                        <a href ="Personal_AddressBook.php">ADDRESS BOOK</a>
                    </li>  <li>
                          <a href ="Personal_Payment.php">PAYMENT</a>
                      </li>
                    <li>
                        <a href ="Personal_Password.php">PASSWORD</a>
                    </li>
                    <li>
                        <a class="active">ORDERS</a>
                    </li>

                    </div>

                </ul>
    	    </div>

            <div class="content">
              <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">ORDERS</div>
                     <div class="panel-body"><!--content-->
                      <div class='allOrders'>
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
    $query = " SELECT * FROM orders WHERE email='$email';";
    $result = mysqli_query($con,$query);
    if($result->num_rows!=0){
      while($rows=$result->fetch_assoc()){
        $total=0;
        $pics=4;
        $ordernum=$rows['orderNum'];
        $date=$rows['Date'];
        $status= $rows['status'];
echo"

  <a href='Personal_TheOrder.php?orderNumber=$ordernum'>
<div class='container'>
  <div class='orderInfo'>
    <label>Order Number: </label>
    <span>$ordernum</span><br>
    <label>Order Date: </label>
    <span>$date</span><br>
    <label>Status: </label>
    <span>$status</span>
    </div>
  <div class='aOrder'>";
 $query2 = " SELECT ProductNo, quantity, price FROM orderitem WHERE orderNum='$ordernum';";
 $result2 = mysqli_query($con,$query2);

      while($rows2=$result2->fetch_assoc()){
 $pnum = $rows2['ProductNo'];
 $quantity= $rows2['quantity'];
 $price = $rows2['price'];
 $total+= ($price*$quantity);
 $query3 = "SELECT pic, price FROM product WHERE productNo= '$pnum';";
 $result3 = mysqli_query($con,$query3);
 $rows3 = mysqli_fetch_assoc($result3);
 $src = $rows3['pic'];
 echo"<img class='productPic' style='margin: 5px;' src='$src'>";
 $pics--;
      if($pics==0){
    echo"<img class='more' src='Pictures/dots.png'>";
    break;
  }
}

  echo"
<br>
<div class='total'><label>Sub Total:</label>$total</div>
</div>
</div>
</a>";}
}
else{
      echo"NO ORDERS WERE FOUND.";}
}
?>

                  <!--content-->   </div>
                    </div>
                </div>
            </div>

		</div>
	</div>
</div>
</div>
</div>
<?php include 'footer.html';?>
</body>
</html>
