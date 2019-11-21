<?php	
	$email=filter_input(INPUT_POST,'email');
	$password=filter_input(INPUT_POST,'pass1');
	$firstname=filter_input(INPUT_POST,'fname');
	$lastname=filter_input(INPUT_POST,'lname');
	$phonenumber=filter_input(INPUT_POST,'phone');

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
	$newcostumer="INSERT INTO `customer`(`Email`, `password`, `First_name`, `Last_name`, `phoneNumber`) VALUES 
          ('$email','$password','$firstname','$lastname','$phonenumber';";
		  $Result=mysqli_query($con,$newcostumer);

	 if(!$Result){
	 	  die("Unable to perform operation");
	 	  header("Location: Registration.php");
	 }
		mysqli_close($con);
		header("Location: Personal_info.php");
}
?>