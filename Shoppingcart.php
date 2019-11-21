<?php
session_start();
include 'db.php';
         
		 
		 
		 $email = $_SESSION['email'];
			
			$stmt = $conn->prepare("SELECT count(price) FROM `cartitem` WHERE `Email`=?");
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $stmt->bind_result($total);
        $stmt->fetch();
        $stmt->close();
			
			   if(isset($_POST['checkout'])){
				 if($total==0){
		
				 echo "<script> alert('your cart is empty ..?');</script>";
				 }
				 else{
					 header('Location:Ceckout.php');
					 
					 
				 }
				
			 }





?>
<html>
<title>shopping cart</title>
<head>
<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Nova+Mono">
<link href="CSS/Footer.css" rel="stylesheet" type="text/css">
<link href="CSS/SCcss.css" rel="stylesheet" type="text/css">
<link rel=stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>


<body>
 <header>
 <?php include 'personal_header.php';?>

  </header>
<article>
 <main>
  <?php
  if(isset($_SESSION['email']))
  {
    $email = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT a.cartitemID,a.productNo,a.Quantity,a.colorID,a.price,b.productNo,b.Name,b.price,b.pic FROM cartitem a, product b WHERE a.Email=? AND a.productNo = b.productNo");
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->bind_result($cartID,$productNo, $quantity, $color, $price, $prodNo, $prodName, $prodPrice, $pic);
    ?>
      <div class="basket">
     
      <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">Price</li>
          <li class="quantity">Quantity</li>
          
        </ul>
      </div>
      <?php
      if($stmt) {
        $total = 0;
      while($stmt->fetch())
      {
        ?>
        <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="<?php echo $pic; ?>" alt="Placholder Image 2" class="product-frame">
          </div>
          <div class="product-details">
            
            <p><strong> proudact name:"<?php echo $prodName; ?>"</strong></p>
            <p>proudact number:"<?php echo $prodNo; ?>"</p>
          </div>
        </div>
        <div class="price"><?php echo $prodPrice; ?></div>
        <div class="quantity">
          <p><?php echo $quantity; ?> </p>
        </div>
        <div class="remove">
		
          <?php echo"<button name='remove' onclick='deleteProduct( $cartID)'>Remove</button>"?>
		
        </div>
      </div>
        <?php
        $total += $price;
      }
    }
	
      $stmt->close();
      ?>
    </div>
    <aside>
      <div class="summary">
        <div class="summary-total-items"><span class="total-items"></span></div>
      
    
        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total"><?php echo $total; ?></div>
        </div>
        <div class="summary-checkout">
		
		<form method="post">
          <button class="checkout-cta" name="checkout">Checkout</button>
		   </form>
		   
		 
        </div>
      </div>
    </aside>
    <?
  } else {
  ?>
  <p></p>
  <?php
  }
  ?>
  </main>
</article>
<script>
  function deleteProduct(id){
	  
    var conf = confirm("Delete item?"+id);
    if (conf == true) {
      var xmlhttp;
try{
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
 else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
xmlhttp.open("GET","deletFromcart.php?id="+ id,false);
xmlhttp.send();
window.location.href=window.location.href;
}

catch(exception){
    alert("Request failed, Please try again");
    }
 }
}
    </script>




</body>


</html>