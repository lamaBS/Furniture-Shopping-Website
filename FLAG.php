<?php

include 'isLogged.php';

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

$Query="UPDATE comment SET Flagged='1' WHERE CommentID='$PostIDFromURL'";

$ViewQuery1="SELECT productNo FROM comment WHERE CommentID='$PostIDFromURL'";


        //  if(!($database = mysql_connect('localhost','root','')))
        //      die("Could not connect to database </body></html>");

        //  if(!mysql_select_db("fortuners",$database))
        //     die("Couldnot open </body></html>");

        //     if(!($result = mysql_query($Query,$database)))
        //     {
        //         print ("<p>Could not execute query!</p>");
        //         die(mysql_error()."</body></html>");
        //     }

      $result= mysqli_query($conn,$Query);

  $Execute2=mysqli_query($conn,$ViewQuery1) or trigger_error(mysql_error());
$DataRows=mysqli_fetch_array($Execute2);
    $productID=$DataRows["productNo"];
         header("Location:product.php?id=$productID");

?>


