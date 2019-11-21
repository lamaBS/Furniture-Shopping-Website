<?php
include 'isLogged.php';
$email = $_SESSION['email'];
$name= filter_input(INPUT_POST, 'cardName');
$number= filter_input(INPUT_POST, 'cardNumber');
$month = filter_input(INPUT_POST, 'exp_m');
$year= filter_input(INPUT_POST, 'exp_y');
 $con= mysqli_connect('localhost','root','');
mysqli_select_db($con,"fortuners");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: ".mysql_connect_error();
  }
  if(!$con) {
  die("Unable to select database");
	}
else{
	 $insert="INSERT INTO `payment` (`paymentID`, `cardNumber`, `expDate_month`, `expDate_year`, `Email`, `Name`) VALUES (NULL, '$number', '$month', '$year', '$email', '$name');";

	 $query = mysqli_query($con,$insert);
	 if(!$query){
	 	  die("Unable to perform operation");
	 }
		mysqli_close($con);
		header("Location: Personal_Payment.php");
}
?>