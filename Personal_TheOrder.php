<?php

    include 'isLogged.php';
    ?>
<html>

<head>
<title>My Account | FORTUNERS</title>
<!--status bar-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nova+Mono">
<link href="CSS\Personal_Orders.css" rel="stylesheet" type="text/css">
<link href="CSS\Personal_navigationbar.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php include 'personal_header.php';?>
<body>

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
                  <a  href ="Personal_orders.php" class="active">ORDERS</a>
                </li>

                    </div>

                </ul>
    	    </div>

            <div class="content">
              <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">ORDERS</div>
                     <div class="panel-body"><!--content-->
                      <div class="theOrder">
                      <div id="tracking">
<?php
    $email = $_SESSION['email'];
    $oNum = $_GET['orderNumber'];
    $con= mysqli_connect('localhost','root','');
    mysqli_select_db($con,"fortuners");
    if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }
   if(!$con) {
     die("Unable to select database");
   }
   $check="SELECT email FROM orders WHERE orderNum='$oNum';";
   $checkResult = mysqli_query($con,$check);
    $checkRows = mysqli_fetch_assoc($checkResult);
    $checkEmail = $checkRows['email'];
    if($email!=$checkEmail){
    header("Location: Personal_orders.php");
    }
  else{
    $query = "SELECT * FROM orders WHERE orderNum='$oNum';";
    $result = mysqli_query($con,$query);
    $rows = mysqli_fetch_assoc($result);
    $date = $rows['Date'];
    $status = $rows['status'];
    if($status!='Returned'){
    if($status=='Received'){
      $received='Pictures/received_active.png';
    }
    else{
      $received='Pictures/received.png';
    }
    if($status=='Processing'){
      $processing='Pictures/processing_active.png';
    }
    else{
      $processing='Pictures/processing.png';
    }
    if($status=='Shipping'){
      $shipping='Pictures/shipping_active.png';
    }
    else{
      $shipping='Pictures/shipping.png';
    }
    if($status=='Delivered'){
      $delivered='Pictures/delivered_active.png';
    }
    else{
      $delivered='Pictures/delivered.png';
    }

echo"
<div class='tracking'>
<img id='received' class='state' src='$received'>
<img class='tarrow' src='Pictures/tracking_arrow.png'>
<img id='processing' class='state' src='$processing'>
<img class='tarrow' src='Pictures/tracking_arrow.png'>
<img id='shipping' class='state' src='$shipping'>
<img class='tarrow' src='Pictures/tracking_arrow.png'>
<img id='delivered' class='state' src='$delivered'>
</div>";}
echo"
<div class='info'>
    <table>

      <tr>
      <td class='tlabel'>Order Number:</td>
      <td id='ordernum'>$oNum</td>
    </tr>
    <tr>
      <td  class='tlabel'>Order Date:</td>
      <td id='orderdate'>$date</td>
    </tr>
      <tr>
      <td class='tlabel'>Status:</td>
      <td id='state'>$status</td>
    </tr>";
    if($status!='Delivered'&&$status!='Returned'){
      echo"
      <tr>
      <td>
       <p id='return'><u style='font-weight: bold' onclick='returning($oNum)'>Return Order</u></p></td></tr>";}
       echo"
    </table>
    </div>";
 $query2 = "SELECT * FROM orderitem WHERE orderNum='$oNum';";
 $result2 = mysqli_query($con,$query2);
 while($rows2=$result2->fetch_assoc()){
  $total = 0;
$orderitemID=$rows2['orderitemID'];
 $pnum = $rows2['productNo'];
 $quantity= $rows2['quantity'];
 $price = $rows2['price'];
 $colorID = $rows2['colorID'];
 $rate = $rows2['rate'];
 $total+= ($price*$quantity);
 $query3 = "SELECT Name,pic FROM product WHERE productNo= '$pnum';";
 $result3 = mysqli_query($con,$query3);
 $rows3 = mysqli_fetch_assoc($result3);
 $src = $rows3['pic'];
 $name = $rows3['Name'];
 $query4 = "SELECT color from productcolor WHERE colorID='$colorID';";
  $result4 = mysqli_query($con,$query4);
 $rows4 = mysqli_fetch_assoc($result4);
 $color = $rows4['color'];
  echo"
      <div class='OrderProduct' style='margin-bottom: 12px;'>

        <img class='productPic' src='$src'>
        <br>$name<br> Color: $color<br> Quantity: $quantity<br> Price: $total SAR
";
       if($status=='Delivered'&&$rate==null){
        echo"
       <div class='rating'>
            <img class='1 star' src='Pictures\star.png' onclick= rate(1,$orderitemID,$pnum)>
            <img class='2 star' src='Pictures\star.png' onclick= rate(2,$orderitemID,$pnum)>
            <img class='3 star' src='Pictures\star.png' onclick= rate(3,$orderitemID,$pnum)>
            <img class='4 star' src='Pictures\star.png' onclick= rate(4,$orderitemID,$pnum)>
            <img class='5 star' src='Pictures\star.png' onclick= rate(5,$orderitemID,$pnum)>
          </div>";}
          if($status=='Delivered'&&$rate!=null){
            echo"
       <div class='rating'>";
            $counter=0;
            for($counter=0;$counter<$rate;$counter++){
              echo"<img src='Pictures/filledStar.png'>";
            }
            while($counter<5){
              echo"<img src='Pictures\star.png'>";
              $counter++;
            }
            echo"</div>";
          }
      echo"</div>";
    }
  }
      ?>
    </div>
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
	</div>
</div>
</div>

<script>
    $(document).ready(function(){

      $("img.star").hover(function(){
        //mouseenter
$(this).attr("src","Pictures/filledStar.png");
$(this).prevAll().attr("src","Pictures/filledStar.png");

      },
function(){
  //mouseleave
$(this).attr("src","Pictures/star.png");
$(this).prevAll().attr("src","Pictures/star.png");
});
     });

    function rate(num,item,product){
      var xmlhttp;
try{
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
 else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
event.target.parentNode.innerHTML = "Rating..";
} else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
event.target.parentNode.innerHTML = xmlhttp.responseText;
} else {
event.target.parentNode.innerHTML = "Error Occurred, please reload page and try again.";
}
};
xmlhttp.open("GET", "rating.php?rate=" + num + "&item=" + item + "&product=" + product, false);
xmlhttp.send();
if(xmlhttp.responseText){
  event.target.parentNode.innerHTML="Thank you!";

}
}

catch(exception){
    alert("Request failed, Please try again.");
    }
 }

    function returning(order){
    var conf = confirm("Confirm order returning?");
    if (conf == true) {
var xmlhttp;
try{
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
 else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
xmlhttp.open("GET", "returning.php?orderNumber=" + order, false);
xmlhttp.send();
window.location.href=window.location.href;
}

catch(exception){
    alert("Request failed, Please try again.");
}
}
}
    </script>
    <?php include 'footer.html';?>
</body>

</div>
</body>
</html>
