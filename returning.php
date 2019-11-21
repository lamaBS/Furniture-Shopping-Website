<?php
$order = $_GET['orderNumber'];

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

	 $updateStatus="UPDATE orders SET status='Returned' WHERE orderNum= '$order';";
	 $result1 = mysqli_query($con,$updateStatus);
	 if(!$result1){
	 	die("Unable to select order");
	 }
	 $products ="SELECT productNo,colorID,quantity FROM orderitem WHERE orderNum='$order';";
	 $result2= mysqli_query($con,$products);
	 if(!$result2){
	 	die("Unable to select order products");
	 }
	 while($rows2=$result2->fetch_assoc()){
	 	$productNum=$rows2['productNo'];
	 	$colorID=$rows2['colorID'];
	 	$quantity=$rows2['quantity'];
	 	$getRefund="SELECT refunded FROM product WHERE ProductNo='$productNum';";
	 	$refundResult= mysqli_query($con,$refundResult);
		$refundRow = mysqli_fetch_assoc($refundResult);
		$newRefund= $refundRow+$quantity;
		$updateRefund = "UPDATE product SET refunded='$newRefund' WHERE ProductNo='$productNum';";
		$rResult = mysqli_query($con,$updateRefund);
	 	$getStock="SELECT stock FROM productcolor WHERE colorID= '$colorID';";
	 	 $result3 = mysqli_query($con,$getStock);
	 	 if(!$result3){
	 	die("Unable to select products information");
	 }
 		 $rows3 = mysqli_fetch_assoc($result3);
 		 $stock=$rows3['stock'];
	 	$newStock=$stock+$quantity;
	 	$updateStock="UPDATE productcolor SET stock='$newStock' WHERE colorID='$colorID';";
	 	$result4 = mysqli_query($con,$updateStock);
	 	if(!$result4){
	 	die("Unable to access order product");
	 }
	}
		mysqli_close($con);
		
}
?>