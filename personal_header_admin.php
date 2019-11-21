<?php
session_start();
include 'db.php';

    $email = $_SESSION['email'];
          // The product add successfully into the certitem table. Now we will get the count
        //$stmt->close();
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
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$coon=mysqli_select_db($conn,"fortuners");
          $sql = "SELECT `Name` FROM `category` WHERE 1 ";
          $result = mysqli_query($conn, $sql);
 if (!$result) {
    die(mysqli_error($conn));
}
 $resultCheck= mysqli_num_rows($result);

          if ($resultCheck > 0){
         echo "<div class='dropdown-content'>";
 while($row = mysqli_fetch_assoc($result)){
        $catName=$row["Name"];
echo " <a href='catogriesAdmin.php?searchWord='$catName'>".$row["Name"]."</a>";  }

   echo "</div>";
  echo "</li>";}

  ?>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">ACCOUNT</a>
      <div class="dropdown-content">
        <a href="#">My Account</a>
        <a href="#">Sign Out</a>
      </div></li>

  <li>
      <div class="row">
          <div class="col-md-4 col-md-offset-3">
              <form action="productSearchAdmin.php" class="search-form">
                  <div class="form-group has-feedback">
                  <label for="search" class="sr-only"></label>
                  <input type="text" class="form-control" name="search" id="search" placeholder="">
                </div>
              </form>
          </div>
      </div></li></ul>
  </header>
</body>
</html>
