
<?php
include 'isLogged.php';
$email = $_SESSION['email'];

$id= $_GET['id'];
//$quantity= filter_input(INPUT_POST, 'quantity');

$quantity = $_POST['Quantity'];

if(isset($_POST['color'])){
    $color= $_POST['color'];
}

$price = filter_input(INPUT_POST, 'price');

$price = $price * $quantity;

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
    
    $selectColor="SELECT * FROM productcolor WHERE productNo='$id' AND color='$color'";

    $result=mysqli_query($con,$selectColor);
    // print_r($result);

  $DataRows=mysqli_fetch_assoc($result);
        $colorID=$DataRows["colorID"];


    $insert=" INSERT INTO `cartitem` (`Email`,`productNo`,`Quantity`,`colorID`,`price`) VALUES ('$email','$id','$quantity','$color','$price');";
    echo $insert;

    $query= mysqli_query($con,$insert);
    if(!$query){
        die("Unabel to add ");
    }
    mysqli_close($con);
    header("Location: product.php?id=$id");


}
  
?>