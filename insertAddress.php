<?php
include 'isLogged.php';
$email = $_SESSION['email'];
$country= filter_input(INPUT_POST, 'country');
$city= filter_input(INPUT_POST, 'city');
$postal= filter_input(INPUT_POST, 'postal');
$street = filter_input(INPUT_POST, 'street');
$building= filter_input(INPUT_POST, 'building');

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
	 $insert="INSERT INTO `address` (`addressID`, `buildingNo`, `street`, `city`, `country`, `postalCode`, `Email`) VALUES (NULL, '$building', '$street', '$city', '$country', '$postal', '$email');";

	 $query = mysqli_query($con,$insert);
	 if(!$query){
	 	  die("Unable to perform operation");
	 }
		mysqli_close($con);

		header("Location: Personal_AddressBook.php");
  }
?>
