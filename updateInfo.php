<?php
include 'isLogged.php';
$email= filter_input(INPUT_POST, 'email');//better to get it from session
$fname= filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$phone= filter_input(INPUT_POST, 'phone');

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
	 $update="UPDATE customer SET First_name='$fname', Last_name='$lname', phoneNumber='$phone' WHERE Email= '$email';";
	 $query = mysqli_query($con,$update);
	 if(!$query){
	 	  die("Unable to perform operation");
	 }
		mysqli_close($con);
		header("Location: Personal_info.php");
}
?>