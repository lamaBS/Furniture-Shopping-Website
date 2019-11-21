<?php
include 'db.php';
    $email = $_SESSION['email'];
        $stmt = $conn->prepare("SELECT count(*) FROM `cartitem` WHERE `Email`=?");
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $stmt->bind_result($cartNo);
        $stmt->fetch();
        $stmt->close();

    
?>
<!DOCTYPE HTML>
<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nova+Mono">
      <link href="CSS/Header.css" rel="stylesheet" type="text/css">
	  
</head>
<body>
  <header>
 <ul>
  <li><img id="img" src="Pictures/LOGO.png"></li>
    <li><a href="#about">ABOUT</a></li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">SHOP</a>
      
    <?php

  $sql = "SELECT `Name` FROM `category` WHERE 1 ";
              $result = mysqli_query($conn, $sql);
     if (!$result) {
        die(mysqli_error($conn));}

     $resultCheck= mysqli_num_rows($result);

              if ($resultCheck > 0){
             echo "<div class='dropdown-content'>";
     while($row = mysqli_fetch_assoc($result)){
       $catName=$row["Name"];
    echo " <a href='catogries.php?searchWord=$catName'>". $row["Name"]."</a>";

   }

       echo "</div>";
      echo "</li>";}



      ?>
      </div>
    </li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">ACCOUNT</a>
      <div class="dropdown-content">
        <a href="#">My Account</a>
        <a href="logout.php">Sign Out</a>
      </div></li>
    <li style="margin-top:-23px;"><a href="Shoppingcart.php"><div class="icon-cart" >
  <input style="color:#ffffff;font-size:12px; float:center;"type="button" id="cart_button" value="<?php if(isset($cartNo)){echo $cartNo;}else{ echo "0";}?>">
      <div class="cart-line-1" style="background-color: #cc9900"></div>
      <div class="cart-line-2" style="background-color: #cc9900"></div>
      <div class="cart-line-3" style="background-color: #cc9900"></div>
      <div class="cart-wheel" style="background-color: #cc9900"></div>
   </a></div></li>
  <li>
      <div class="row">
          <div class="col-md-4 col-md-offset-3">
              <form name="searchForm" action="productSearch.php" class="search-form" method="get" onsubmit="return validateSearch()">
                  <div class="form-group has-feedback">
                  <label for="search" class="sr-only"></label>
                  <input type="text" class="form-control" name="search" id="search" placeholder="">
                </div>
				   <script>
    function validateSearch() {
      var Search = document.forms["searchForm"]["searchWord"].value;

      if (Search == "") {
       alert("Please specify your search first");
       return false;
      }
      if(!isNaN(Search)){
        alert("Number is not allowed");
        return false;
      }
      return true;
    }
    </script>
              </form>
          </div>
      </div></li></ul>
  </header>
</body>
</html>
