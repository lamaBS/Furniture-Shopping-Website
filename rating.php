<?php
$rate = $_GET['rate'];
$item = $_GET['item'];
$product = $_GET['product'];

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
	 $updateItem="UPDATE orderitem SET rate='$rate' WHERE orderitemID= '$item';";
	 $query1 = mysqli_query($con,$updateItem);
	 $avg="SELECT avgRate, numOfRate FROM product WHERE productNo='$product';";
	 $query2= mysqli_query($con,$avg);
	 $rows2 = mysqli_fetch_assoc($query2);
 	 $avgRate = $rows2['avgRate'];
 	 $numrates = $rows2['numOfRate'];
 	 $newRate = ((($avgRate*$numrates)+$rate)/++$numrates);
 	 $updateProduct="UPDATE product SET avgRate='$newRate', numOfRate='$numrates' WHERE productNo='$product';";
 	 $query3= mysqli_query($con,$updateProduct);
	 if(!($query1&&$query2&&$query3)){
	 	  die("Unable to perform operation");
	 }
	 else{
	 	echo"true";
	 }

		mysqli_close($con);
}
?>