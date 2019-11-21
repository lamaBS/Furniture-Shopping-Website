<?php

session_start();
include 'db.php';
$id= $_GET['id'];
 $delete="DELETE FROM `cartitem` WHERE cartitemID='$id';";
	 $query = mysqli_query($conn,$delete);
	 if(!$query){
	 die("Unable to perform operation");}
	 else{
		 
		 "<script> alert('item deleted!!');</script>";
		 
	 }

?>