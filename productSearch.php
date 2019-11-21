<?php


	$DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASSWORD = '';
    $DB_DATABASE = 'fortuners';


	//Connect to mysql server
    $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
	if(!$con) {
		die('Failed to connect to server: ' . mysql_error());
	}

	//Select database
    $db = mysqli_select_db( $con , $DB_DATABASE );
	if(!$db) {
		die("Unable to select database");
	}
	$price = array();
	$where = array();
	$conditions = "";
	$orderby = "";
	if(!empty($_POST['price'])) {
		foreach($_POST['price'] as $p){
			if($p == 0)
				$price[] = '`price` <= 200';
			elseif ($p == 1200)
				$price[] = '`price` >= 1200';
			else
				$price[] = "`price` BETWEEN ".$p." AND ".($p + 200);
		}
		$where[] = "(".implode(" OR ", $price).")";
	}
	if(!empty($_POST['radio'])) {
		if($_POST['radio'] == 'htl')
			$orderby = "ORDER BY `price` DESC";
		else
			$orderby = "ORDER BY `price` ASC";
	}
	if(!empty($_POST['sale'])) {
		$where[] = "`discount` > 0";
	}
	if(!empty($_POST['available'])) {
		$where[] = "`inStock` > 0";
	}
	$conditions = implode(" AND ", $where);
 ?>
<html>

<head>
<title> SEARCH| FORTUNERS</title>
<!--status bar-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nova+Mono">
<link href="CSS/searchOrder.css" rel="stylesheet" type="text/css">
<link href="CSS/radio.css" rel="stylesheet" type="text/css">
<link href="CSS/checkbox.css" rel="stylesheet" type="text/css">
<link href="CSS/searchHolder.css" rel="stylesheet" type="text/css">

<!--pcart part-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--ajax-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>
<body>

<?php

include 'personal_header.php';
 ?>

<div class="navigationbar">
<div class="container">
	<div class="row">
		<div class="wrapper">
			<form action="<?="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>" method="post">
    	    <div class="side-bar">

            <ul>
              <li class="menu-head"><h3>Sort</h3></li>
              <li>
              <div class="dropdown">

  <label class="con">price high to low
  <input type="radio" name="radio" value="htl">
  <span class="checkmarkR"></span>
</label>
<label class="con">price low to high
  <input type="radio" name="radio" value="lth">
  <span class="checkmarkR"></span>
</label>
</div>
              </li>
  <li class="menu-head"><h3>Filtering</h3></li>
                 <li>
                   <label class="con2">on sale
  <input type="checkbox" name="sale" value="sale">
  <span class="checkmarkCx"></span>
</label>
<label class="con2">whats available
  <input type="checkbox" name="available" value="ava">
  <span class="checkmarkCx"></span>
</label>

				   <div class="dropdown">
                       <a href="javascript:void(0)" class="dropbtn searchF"> -price</a>

 <div class="dropdown-content">


	    <label class="con2">under 200SAR
	      <input type="checkbox" name="price[]" value="0">
	      <span class="checkmarkCx"></span>
	    </label>
	    <label class="con2">200SAR-400SAR
	      <input type="checkbox" name="price[]" value="200">
	      <span class="checkmarkCx"></span>
	    </label>
	    <label class="con2">400SAR-600SAR
	      <input type="checkbox" name="price[]" value="400">
	      <span class="checkmarkCx"></span>
	    </label>
	    <label class="con2">600SAR-800SAR
	      <input type="checkbox" name="price[]" value="600">
	      <span class="checkmarkCx"></span>
	    </label>
	    <label class="con2">800SAR-1000SAR
	      <input type="checkbox" name="price[]" value="800">
	      <span class="checkmarkCx"></span>
	    </label>
	    <label class="con2">1000SAR-1200SAR
	      <input type="checkbox" name="price[]" value="1000">
	      <span class="checkmarkCx"></span>
	    </label>
	    <label class="con2">1200SAR and up
	      <input type="checkbox" name="price[]" value="1200">
	      <span class="checkmarkCx"></span>
	    </label>



</div>

</div>
                  </li>




                </ul>
				<input type="submit" value="Filter!" style="width: 130px;margin-left: 50px;">
    	    </div><!--end side-bar-->
			</form>
            <div class="content">
              <div class="col-md-12">
                 <div class="panel panel-default">
                   <?php $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
                   $searchq = "";
				   if(!$con) {
                   die('Failed to connect to server: ' .
                   mysql_error());
                   }
                   //Select database
                   //$db = mysqli_select_db($DB_DATABASE);
                   if(!$db) {
                   die("Unable to select database");
                   }
                   $output = '';
                   if(isset($_GET['searchWord'])){
                     $searchq = $_GET['searchWord'];
     ?>
     <div class="panel-heading">your search for "<?=$searchq?>" </div>
                     <div class="panel-body"><!--content-->


<div class="track">

</div>
          <div class="order">
<div class="view">

      <br>

      <div class="product">

<?php

if($searchq=='room'||$searchq=='Room'){
	$sql = "SELECT * FROM product WHERE catID=3 ";
	$sql = !empty($conditions) ? $sql."AND".$conditions : $sql;
	$sql = !empty($orderby) ? $sql." ".$orderby : $sql;
	$query=mysqli_query($con, $sql) or  die ("Could not search  $searchq !");
}

else if($searchq=='kitchen'||$searchq=='Kitchen'){
	$sql = "SELECT * FROM product WHERE catID=1 ";
	$sql = !empty($conditions) ? $sql."AND".$conditions : $sql;
	$sql = !empty($orderby) ? $sql." ".$orderby : $sql;
	$query=mysqli_query($con, $sql) or  die ("Could not search  $searchq !");

}

else if($searchq=='Furniture'||$searchq=='furniture'||$searchq=='home'||$searchq=='Home'){
	$sql = "SELECT * FROM product WHERE catID=2 ";
	$sql = !empty($conditions) ? $sql."AND".$conditions : $sql;
	$sql = !empty($orderby) ? $sql." ".$orderby : $sql;
	$query=mysqli_query($con, $sql) or   die ("Could not search  $searchq !");

}
else{
	$sql = "SELECT * FROM product WHERE Name LIKE '%$searchq%' ";
	$sql = !empty($conditions) ? $sql."AND".$conditions : $sql;
	$sql = !empty($orderby) ? $sql." ".$orderby : $sql;
	$query = mysqli_query($con, $sql)  or   die ("Could not search  $searchq !");
}
					 $count = mysqli_num_rows($query);
                     if ($count == 0){
                      echo 'Sorry..no results were found ';

                     }else {
                       while($row = mysqli_fetch_array($query )){
                         $Name = $row['Name'];
                         $price = $row['price'];
                         $img= $row['pic'];
												   $id= $row['productNo'];
 ?>

                                         <div class="container" style="display: inline-block; width: 250px;margin: 1px; height:450px;">
                                          <img src="<?=$img?>">
                                          <br><br><?=$Name?><br><?=$price?> SR<a href="product.php?id=<?=$id?>"></a> <br>
                                          <a href="product.php?id=<?=$id?>">view Product</a>
                                        </div>
																				<?php
																				}
																				}
																				}
																				 ?>


    </div>
    </div>
  </div>
</div>
	</div>



                  <!--content-->   </div>
                    </div>
                </div>
            </div>

		</div>
	</div>
</div>
</div>



<footer class="footer">
  <?php
  include('footer.html');
   ?>
   </footer>
</div>
</body>
</html>
