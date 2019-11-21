<?php

$id=$_GET["id"];


$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$conn = mysqli_connect($servername, $username, $password);
$coon=mysqli_select_db($conn,"fortuners");
// Check connection
if (!$coon) {
    die("Connection failed: " . mysqli_connect_error());
}

$ViewQuery="SELECT discount,orgPrice FROM product WHERE productNo='$id'";

$result = mysqli_query($conn, $ViewQuery);

while($DataRows=mysqli_fetch_array($result)){
    $discount=$DataRows["discount"];
    $orgPrice=$DataRows["orgPrice"];

}

if($discount!= 1)
echo "$".$orgPrice;


?>
