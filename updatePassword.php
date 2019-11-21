<?php
include 'isLogged.php';
    $email = $_SESSION['email'];
$password= filter_input(INPUT_POST, 'pass1');

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
	 $update="UPDATE customer SET password='$password' WHERE Email= '$email'";
	 $query = mysqli_query($con,$update);
	 if(!$query){
	 	  die("Unable to perform operation");
	 }
		mysqli_close();
		header("Location: Personal_info.php");
}
?>