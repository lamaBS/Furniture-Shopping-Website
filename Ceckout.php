<?php
session_start();
include 'db.php';
if(isset($_POST['submit'])){
	
	if(empty($_POST['addres'])|| empty($_POST['payment'])){
		 echo "<script> alert('chose addres and payment please!!');</script>";;	
	}
	
	else{
			 $email = $_SESSION['email'];
		 $date=date("Y/m/d");
		 $status="Received";
		  $stmt = $conn->prepare("INSERT INTO orders(Date,Email,status)VALUES(?,?,?)");
          $stmt->bind_param('sss',$date,$email,$status);
		  $stmt->execute();
		    $stmt->fetch();
            $stmt->close();
			
			
			$getordernumber="SELECT `orderNum` FROM `orders` ORDER BY `orderNum` DESC LIMIT 1;";
			$Result= mysqli_query($conn,$getordernumber);
			$bla=mysqli_fetch_assoc($Result);
			$ordernumber=$bla['orderNum'];
			
   
			
			
			$sql="SELECT * FROM cartitem WHERE Email='$email';";
		$result=mysqli_query($conn,$sql);
		while($row=$result->fetch_assoc()){
			$productNo=$row['productNo'];
			$quantity=$row['Quantity'];
			$colorID=$row['colorID'];
			$price=$row['price'];
			$insertQuery="INSERT INTO `orderitem`(`orderitemID`, `productNo`, `quantity`, `colorID`, `orderNum`, `rate`, `price`) 
			VALUES ('','$productNo','$quantity','$colorID','$ordernumber','','$price');";
			$inserResult= mysqli_query($conn,$insertQuery);	
			
			
			$getStock="SELECT stock FROM productcolor WHERE colorID= '$colorID';";
	 	 $result3 = mysqli_query($conn,$getStock);
	 	 if(!$result3){
	 	die("Unable to select products information");
	 }
 		 $rows3 = mysqli_fetch_assoc($result3);
 		 $stock=$rows3['stock'];
	 	$newStock=$stock-$quantity;
	 	$updateStock="UPDATE productcolor SET stock='$newStock' WHERE colorID='$colorID';";
	 	$result4 = mysqli_query($conn,$updateStock);
	 	if(!$result4){
	 	die("Unable to access order product");
	 }
		
		
		
		
		
			$getsold="SELECT sold FROM product WHERE productNo='$productNo';";
	 	 $result4 = mysqli_query($conn,$getsold);
	 	 if(!$result4){
	 	die("Unable to select products information");
	 }
 		 $rows4 = mysqli_fetch_assoc($result4);
 		 $sold=$rows4['sold'];
	 	$newsold=$sold+$quantity;
	 	$updateStock="UPDATE product SET sold='$newsold' WHERE productNo='$productNo';";
	 	$result5 = mysqli_query($conn,$updateStock);
	 	if(!$result5){
	 	die("Unable to access order product");
	 }
		
		
			
		}
	
		   $emptyquery="DELETE FROM `cartitem` WHERE Email='$email';";
		   $final=mysqli_query($conn,$emptyquery);
			
	
		    echo "<script> alert('thank you for ordering ..');</script>";
			
	}
}
?>
<!DOCTYPE html>
<html>
 <head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type = "text/css " href= "CSS/Ceckout.css">
    <title>Checkout</title>

 </head>

 <body>
 <?php
if(isset($_SESSION['email'])){
 $email = $_SESSION['email'];
 $stmt = $conn->prepare("SELECT * FROM address WHERE Email=?");
  $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->bind_result($addressID,$buildingNo, $street, $city, $country, $postalCode,$Email);
?>

<form class="contant" action="Ceckout.php" method="post">
<h1> Chose addres and pyment OR add new one ..<a href="#">her</a> <h1>
<table>
<thead><tr><th><i class="material-icons">&#xe0c8;</i><br>addres:</th></tr></thead>
    <?php 
      while($stmt->fetch())
      {
		  ?>
<tbody>
<tr>
<td>City:<?php echo $city;?><br>Country:<?php echo $country;?><br>Building:<?php echo $buildingNo;?><br><input type="radio" name="addres" value="addres"></td>
</tr>
	  
	<?php
	}
   $stmt->close();
   ?>
    <?php
if(isset($_SESSION['email'])){
 $email = $_SESSION['email'];
 $stmt = $conn->prepare("SELECT * FROM payment WHERE Email=?");
  $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->bind_result($pymentID,$cardNumber, $expDate_month, $expDate_year, $Email, $Name);
?>
<thead><tr><th><i style="font-size:24px" class="fa">&#xf283;</i><br>pyment:</th></tr></thead>
       <?php 
      while($stmt->fetch())
      {
		  ?>
		  <tr>
<td>Expaierd Date:<?php echo $expDate_month;?><br>Cardnumber:<?php echo $cardNumber;?><br>Name:<?php echo $Name;?><br> 
<input type="radio" name="payment" value="payment"></td>
 </tr><br>

	<?php
	}
   $stmt->close();
   ?>
   
   
   
   
   
   
   
   
   

	  </tbody>
</table>
<button type="submit"name="submit">ORDER</button>
</form>
<? }else { ?>

<?php
echo "";
}
?>
	
<? }else { ?>

<?php
echo "";
}
?>
		
	
	
	
	
	
	
 </body>
</html>