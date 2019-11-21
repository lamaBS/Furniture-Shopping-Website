<?php
include 'isLogged.php';
$id= $_GET['id'];

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
	 $delete="DELETE FROM `address` WHERE addressID='$id';";
	 
	 $query = mysqli_query($con,$delete);
	 if(!$query){
	 	  die("Unable to perform operation");
	 }
		mysqli_close($con);
}
		
?>