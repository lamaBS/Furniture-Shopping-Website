<?php
include 'isLogged.php';
$country= filter_input(INPUT_POST, 'country');
$city= filter_input(INPUT_POST, 'city');
$postal= filter_input(INPUT_POST, 'postal');
$street = filter_input(INPUT_POST, 'street');
$building= filter_input(INPUT_POST, 'building');
$id = $_GET['id'];

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
	 $update="UPDATE address SET country='$country', city='$city', postalCode='$postal', street='$street', buildingNo='$building' WHERE addressID= '$id'";

	 $query = mysqli_query($con,$update);
	 if(!$query){
	 	  die("Unable to perform operation");
	 }
		mysqli_close($con);

		header("Location: Personal_AddressBook.php");
  }
?>
