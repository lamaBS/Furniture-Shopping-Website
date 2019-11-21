
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
                          <a href="viewReport.php" class="active"> VIEW REPORT <span class="glyphicon glyphicon-dashboard pull-right"></span></a>
                      </li>
                        <li>
                            <a href="addProduct.php" >ADD PRODUCT<span class="glyphicon glyphicon-heart pull-right"></span></a>
                        </li>
                      <li>
                          <a href="addCat" >ADD CATIGORY<span class="glyphicon glyphicon-heart pull-right"></span></a>
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
                     <div class="panel-heading">REPORT</div>
                    
			<br>
				<br>
				<br>
				<br>
<div style="color:#cc9900; font-size:28px;">Refunded Product</div>
					
					
				<br>
				
				 
			<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$coon=mysqli_select_db($conn,"fortuners");
          $sql = "SELECT * FROM product WHERE refunded >0 ORDER BY refunded DESC;";
          $result = mysqli_query($conn, $sql);
 if (!$result) {
    die(mysqli_error($conn));
}  $resultCheck= mysqli_num_rows($result);
if($resultCheck>0){
  echo "<table id='t1' width='860'>";
  echo "<tr><th>&nbsp; &nbsp;Product ID&nbsp; &nbsp; </th><th>&nbsp; &nbsp;name&nbsp; &nbsp; </th><th>&nbsp; &nbsp;price &nbsp; &nbsp; </th><th> &nbsp; &nbsp; average Raiting &nbsp; &nbsp;</th><th> &nbsp; &nbsp; refunded &nbsp; &nbsp;</th></tr>";
while($row=mysqli_fetch_assoc($result)){
echo "<tr>";
echo "<td>&nbsp; &nbsp;".$row['productNo']."&nbsp; &nbsp;</td><td>&nbsp; &nbsp;".$row['Name']."&nbsp; &nbsp;</td><td>&nbsp; &nbsp;".$row['price']."&nbsp; &nbsp;</td><td>&nbsp; &nbsp;".$row['avgRate']."&nbsp; &nbsp;</td><td>&nbsp; &nbsp;".$row['refunded']."&nbsp; &nbsp;</td>";
echo "</tr>";
}
echo "</table>";
}?>
               
					<br>
				<br>


		</div>
	</div>
</div>
</div>


<footer class="footer">
  <p id="about"><p><a href="mailto:Fortuners@admin.com">Email us</a>
  Follow us <a href="#" class="fa fa-twitter"></a><a href="#" class="fa fa-instagram"></a></p>
   <p> &copy 2018 </p>

   </footer>
</div>
</body>
</html>
