
<html>

<head>
<title>My Account | Home</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Nova+Mono">
<link href="CSS/Header.css" rel="stylesheet" type="text/css">
<link href="CSS/Footer.css" rel="stylesheet" type="text/css">
<link href="CSS/admin_NavigationBar.css" rel="stylesheet" type="text/css">
<link href="CSS/sitting.css" rel="stylesheet" type="text/css">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


  
</head>
<?php include_once 'personal_header_admin.php';?>


<div class="navigationbar">
<div class="container">
  <div class="row">
    <div class="wrapper">
          <div class="side-bar">

                <ul>
                    <li class="menu-head">
                      ADMIN ACCOUNT <a href="#" class="push_menu"><span class="glyphicon glyphicon-align-justify pull-right"></span></a>
                    </li>
                    <div class="menu">
       <li>
                          <a href="adminPage.php">HOME <span class="glyphicon glyphicon-dashboard pull-right"></span></a>
                      </li>
                      <li>
                          <a href="viewReport.php"> VIEW REPORT <span class="glyphicon glyphicon-dashboard pull-right"></span></a>
                      </li>
                        <li>
                            <a href="addProduct.php" class="active" >ADD PRODUCT<span class="glyphicon glyphicon-heart pull-right"></span></a>
                        </li>
                      <li>
                          <a href="addCat.php" >ADD CATIGORY<span class="glyphicon glyphicon-heart pull-right"></span></a>
                      </li>
                     <li>
                          <a href="sittingPass.php">SITTING<span class="glyphicon glyphicon-heart pull-right"></span></a>
                      </li>
                     

                    </div>

                </ul>
          </div>

            <div class="content">
              <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">ADD PRODUCT PAGE</div>
                   
                    </div>
                
                <div>
                
                <br>
                <div class="oldPassword">
             <p style="color: black; font-weight:20px;">please complete this form : </p>  
      <form   method="POST" enctype="multipart/form-data">
        <br>
<label size="1%" style="color:#cc9900;font-family: 'Nova Mono', sans-serif;border-radius: 5%"> Carigory <br><?php
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
echo " &nbsp; &nbsp; <select name='selected'style='width:200px; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;' >";
$count=1;
         while($row = mysqli_fetch_assoc($result)){
echo "<option value ='$count'>". $row["Name"]."</option>";
$count++;
          }
          echo "</select>";
          
        }

          mysqli_close($conn);
        ?></label> 
 <br>
 <br>
 <label style="color:#cc9900;font-family: 'Nova Mono', sans-serif;"> Name   :<br><input type="text" name="name" onfocus="this.value=''" value="" size="35%"style="color:#F5B041; font-family: Arial; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;" required></label> 
<br>
<br>
<label style="color:#cc9900;font-family: 'Nova Mono', sans-serif;"> price   :<br><input type="text" name="price"onfocus="this.value=''" value=""size="35%"style="color:#F5B041; font-family: Arial; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;" required></label>
<br>
<br>
<label style="color:#cc9900;font-family: 'Nova Mono', sans-serif;"> Color  :&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;Available  :
  <br><br><input type="text" name ="color1" onfocus="this.value=''" value=""size="35%"style="color:#F5B041; font-family: Arial;border-radius: 5%; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <input type="text" name="stock11" onfocus="this.value=''" value=""size="35%" style="color:#F5B041; font-family: Arial; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;">
  <br><br>
  <input type="rext" name ="color2" onfocus="this.value=''" value=""size="35%"style="color:#F5B041; font-family: Arial;border-radius: 5%; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;" >&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <input type="text" name="stock22" onfocus="this.value=''" value=""size="35%" style="color:#F5B041; font-family: Arial; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;" >
  <br><br>
  <input type="text" name ="color3" onfocus="this.value=''" value=""size="35%"style="color:#F5B041; font-family: Arial;border-radius: 5%; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;" >&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <input type="text" name="stock33" onfocus="this.value=''" value=""size="35%" style="color:#F5B041; font-family: Arial; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;" >
</label>

<br>
<br>
<div> <label style="color:#cc9900;font-family: 'Nova Mono', sans-serif;"> Image   : </label><br><br>
&nbsp; &nbsp; <input name="file" type="file" multiple size="35%" style=" color:#F5B041; font-family: Arial; border:solid ; padding:5px; margin-top:8px; border-radius:5px; border-color: #D4D3D3;" required>
</div>
<br>
<label style="color:#cc9900;font-family: 'Nova Mono', sans-serif;"> Discount:<br>
  <span style="color: red; font-size: 15px;">*NOTE : enter the discount amount like normal integer for example 40 or 50 </span><br>
 <span style="color: red; font-size: 15px;">don't enter any character like % </span><br>
  <input type="text" name="discount" onfocus="this.value=''" value=""size="35%"style="color:#F5B041; font-family: Arial; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;" ></label> 
 <br>
  <br>
<label style="color:#cc9900;font-family: 'Nova Mono', sans-serif;"> Description :<br>
<span style="color: red; font-size: 15px;">*NOTE : drag the small arrow in the corner to have more space</span>
<br> &nbsp; &nbsp;<textarea name="dis" rows="3" cols="4"  type="text" onfocus="this.value=''" value="" style=" color:#F5B041; font-family: Arial; border-radius:5% ;hight:12%; width:20%;  padding:5px; margin-top:8px; border-radius:5px;  border:solid ;border-color: #D4D3D3;"></textarea></label> 

<button name="submit" style="left: 400px; font-size: 20px;padding:10px; font-size: 20px; border-radius:7px;" onclick="return confirm('Are you sure you want to ADD??');">Add</button>

<button name="submit"  type="reset" style="left: 400px; font-size: 20px;padding:10px; font-size: 20px; border-radius:7px;">cancel</button>
<br>
<br>
<?php
$servername = "localhost";
$username = "root";
$password = "";


$conn = mysqli_connect($servername, $username, $password);
$coon=mysqli_select_db($conn,"fortuners");
if(isset($_POST["submit"])){

  // --------------------------------------------------- The pic -------------------------------------------
$fileName=$_FILES["file"]["name"];
$fileTmpName=$_FILES["file"]["tmp_name"];
$fileExt = explode('.', $fileName);
$fileExtNew = strtolower(end($fileExt));
$namePic = uniqid();
$fileNameNew = $fileName;
$filePath = "photo/".$fileNameNew;
move_uploaded_file($fileTmpName,$filePath);
//------------------------------------------------------ The descount --------------------------------------
if ($_POST['discount'] == 0){
  $pr = $_POST['price'];
}
else{
$des = $_POST['discount']/100;
$pr = $des*($_POST['price']);
}


// --------------------------------------------------- Insert -------------------------------------------
$query = "INSERT INTO product (orgPrice, price, description, avgRate, refunded, sold,Name,numOfRate,catID,discount,pic)
VALUES ('".$_POST['price']."','$pr','".$_POST['dis']."','0','0','0','".$_POST['name']."',0,'".$_POST['selected']."','".$_POST['discount']."','$filePath')";
if ($conn->query($query) === TRUE) {
  //-------------------------------------------- add the color ------------------------------------------

$sqlCheck = "SELECT `productNo` FROM `product` WHERE `pic`='$filePath';";
$resultCheck = mysqli_query($conn,$sqlCheck);
 $row=mysqli_fetch_assoc($resultCheck);
$check = $row['productNo'];


$query2 = "INSERT INTO productcolor(productNo,color,stock) VALUES ('$check','".$_POST['color1']."','".$_POST['stock11']."')";
if ($conn->query($query2) === TRUE) {
$query3 = "INSERT INTO productcolor(productNo,color,stock) VALUES ('$check','".$_POST['color2']."','".$_POST['stock22']."')";
if ($conn->query($query3) === TRUE) {
$query4 = "INSERT INTO productcolor(productNo,color,stock) VALUES ('$check','".$_POST['color3']."','".$_POST['stock33']."')";
if ($conn->query($query4) === TRUE) {
  echo "<p style='color:red; font-size:20;'> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Inserted</p> ";}
  else {die("Error inserting The product ");}
 }else {die("Error inserting The product ");}
 }else {die("Error inserting The product ");} 

} //if
else {
    
}
}//set
?>
</form>






                </div>
            </div>

    </div>
  </div>
</div>
</div>


<footer class="footer">
  <p id="about"><p><a href="mailto:Fortuners@admin.com">Email us</a>
  Follow us <a href="#" class="fa fa-twitter"></a><a href="#" class="fa fa-instagram"></a></p>
   <p> &copy; 2018 </p>

   </footer>
</div>
</body>
</html>
