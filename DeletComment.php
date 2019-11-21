<?php include 'isLogged.php';
?>

<?php


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

$PostIDFromURL=$_GET['id'];

$ViewQuery1="SELECT productNo FROM comment WHERE CommentID='$PostIDFromURL'";


if(!($result = mysqli_query($conn,$ViewQuery1)))
{
   print ("<p>Could not execute query!</p>");
   die(mysqli_error()."</body></html>");
}

$Execute2=mysqli_query($conn,$ViewQuery1) or trigger_error(mysqli_error());
$DataRows=mysqli_fetch_array($Execute2);
$productID=$DataRows["productNo"];

$Query="DELETE FROM comment WHERE CommentID='$PostIDFromURL'";

if(!($result = mysqli_query($conn,$Query)))
{
   print ("<p>Could not execute query!</p>");
   die(mysqli_error()."</body></html>");
}

header("Location:productAdmin.php?id=$productID");


?>