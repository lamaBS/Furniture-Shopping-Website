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

$Page=$_GET["id"];
$ViewQuery="SELECT * FROM product WHERE productNo='$Page'";
$Execute=mysqli_query($conn,$ViewQuery);
while($DataRows=mysqli_fetch_array($Execute))
        $pageTitle=$DataRows["Name"];


?>



<!DOCTYPE html>

<html>
<head>
  <title> FORTUNERS | <?php echo $pageTitle ?></title>
  <link href="CSS/Footer.css" rel="stylesheet" type="text/css">
  <link href="CSS/product.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nova+Mono">
<!-- <link href="comments.css" rel="stylesheet" type="text/css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>

.CommentBlock{
padding : 0px;
}

p a:hover{
  color: red;

}
p a{
    color:#cc9900;
}

 #number{
  width: 150px;
  height:34px;
   /* padding: 12px 12px 12px;  */
    background-color: #ffffff;
    border-radius: 5px;
    color: #cc9900;
    font-size: 22px;
    margin: 15px;
    -webkit-appearance: none;
    -moz-appearance: none;
         appearance: none;
}

    </style>

 

  </head>
<body>



<?php include 'personal_header.php';?>

<?php

$PostIDFromURL=$_GET["id"];
$ViewQuery="SELECT * FROM product WHERE productNo='$PostIDFromURL'";
$Execute=mysqli_query($conn,$ViewQuery);
while($DataRows=mysqli_fetch_array($Execute)){
    $productNo=$DataRows["productNo"];
    $orgPrice=$DataRows["orgPrice"];
    $Name=$DataRows["Name"];
    $price=$DataRows["price"];
    $description=$DataRows["description"];
    $avgRate=$DataRows['avgRate'];
    $discount=$DataRows['discount'];
    $imgMain=$DataRows["pic"];}
    






?>

        <!-- slkfnsvm.fmsfms.fm,fm.sfmls.fmvs.,fmlsfsm.v -->
        <div class="navigationbar">
                <div class="container">
        <div class="row">
                <div class="wrapper">



                <form action="AddToCart.php?id=<?php echo $_GET['id'];?>" method="post">

                        <div class="product-image">
                                <div class="preview"><img src="<?php echo $imgMain?>" alt=""></div>

   
    </div>
    <div class="info"> 
                                 <br> 
                                  <div class="info-field"> <span class="product-name" name="name"><?php echo $Name?></span>

                                  </div>
                                   <div class="info-field"> <p class="product-price" name="price">$<?php echo $price ?>   &nbsp;&nbsp;<span class="diss"style="text-decoration: line-through; color:gray;  font-size:15px;" > </span></p>

                                   </div>

                                   <div style="color:red; forn-size:30ps; margin-left:140px;">
                                   <?php
                                   $count=0;
                                   $id=$_GET["id"];

                                $ExtractingColor="SELECT * FROM productcolor WHERE productNo='$id'";

                               $Execute=mysqli_query($conn,$ExtractingColor);
                               while($DataRows=mysqli_fetch_array($Execute)){
                              $stock=$DataRows["stock"];
                               $count=$count+$stock;

                                 }


                                  if($count == 0 ){

                                    echo "OUT OF STOCK =(";
                                    // echo '<script type="text/javascript"> OutStock();</script>';


                                  }

                                    ?>
                                   
                                   </div>
                                     
                                     <div style=""class="info-field"> <div class="select-dropdown">
                      <?php
                         $servername = "localhost";
                           $username = "root";
                            $password = "";

                       $conn = mysqli_connect($servername, $username, $password);
           $coon=mysqli_select_db($conn,"fortuners");
             $sql = "SELECT * FROM `productcolor` WHERE productNO='$id'";

            $result = mysqli_query($conn, $sql);
 if (!$result) {
    die(mysqli_error($conn));
}

          $resultCheck= mysqli_num_rows($result);

          if ($resultCheck > 0){
echo " &nbsp; &nbsp; <select name='color'style='width:115px; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;' >";
         while($row = mysqli_fetch_assoc($result)){
echo "<option value =".$row["colorID"].">". $row["color"]."</option>";
          }
          echo "</select>";
          
        }

          mysqli_close($conn);
        ?></label>
                                                     
                                      <input id="number" type="number" value="1" name="Quantity" min="1" style='width:110px; height:15px; padding:5px; margin-top:8px; border-radius:5px; border:solid ;border-color: #D4D3D3;'>

                                          </div>

                                     </div>
                                     <div class="info-field" >
                                            <br><br>
                                            <div class="info-field"> 
                                                    <button class="product-addtocart" type="submit" name="submitCart" id="addCartButton">Add To Cart</button>     
                                            </div>
                                            <div class="info-field">
                                           <p style="color:gray;  font-size:15px; "> Rating <?php echo $avgRate?></p>
                                            </div>
                                            </form>
                                   
                                     <br><br>
                                     <div class="info-field"> <span class="product-description"><?php echo $description; ?></span>

                                     </div>  

                                     <div class="info-field" class="share">
                                            <a href="https://twitter.com/" class="share-link" id= "twitter"><i style="font-size:24px" class="fa">&#xf099;</i>  </a>
                                            <a href="https://www.pinterest.com/" class="share-link" id= "pin"><i style="font-size:24px" class="fa">&#xf0d2;</i> </a>
                                    </div>

    </div>

        
        
        
        
        
        
        
                             <!--end of content-->
        
                            
                        </div>
                        <br>
                        <hr width=919px;>

<?php


if(isset($_POST["submit"]))
{
    $Name=$_POST['Name'];
    $Comment=$_POST['comments'];
date_default_timezone_set("Asia/Riyadh");
$CurrentTime=time();
$Date=strftime("%Y-%d-%m",$CurrentTime);
$Time=strftime("%H:%M:%S",$CurrentTime);

if(empty($Name) ||empty($Comment)){
	$_SESSION["ErrorMessage"]="All Fields are required";
	
}elseif(strlen($Comment)>500){
	$_SESSION["ErrorMessage"]="only 500  Characters are Allowed in Comment";
	
}else{
    
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
        $Query="INSERT INTO comment (Name,Flagged,Text,Date,Time,productNo)
	VALUES ('$Name','0','$Comment','$Date','$Time','$PostIDFromURL')";
    $Execute=mysqli_query($conn,$Query);
    

	if($Execute){
	$_SESSION["SuccessMessage"]="Comment Submitted Successfully";
	// Redirect_to("product.php?id={$PostIDFromURL}");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
// header("location:product.php?id={$PostIDFromURL}");



	}
	
}	
	
}

?>


                        <p id="commentSection">comments section</p><br><br>
            
                        <form action="product.php?id=<?php echo $PostIDFromURL; ?>" method="post">
                            <div class="form-group">
                                <label for="CommentName">Name : </label>
                                <input class="form-control" type="Name" name="Name" id="Email" placeholder="Name">
                 </div>
                 <div class="comments">
                <div class="comment-wrap">
                   <textarea name="comments" class="comment-block" cols="30" rows="3" placeholder="Add comment..."></textarea>
                                     
              </div>
        
        </div>
            
           <input class="buttonSub" type="submit" class="send-msg" value="Submit" name="submit"><br>
                                </form><br>

                                

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
$PostIdForComments=$_GET["id"];
$ExtractingCommentsQuery="SELECT * FROM comment WHERE productNo='$PostIdForComments'";
$Execute=mysqli_query($conn,$ExtractingCommentsQuery);
while($DataRows=mysqli_fetch_array($Execute)){
    $CommenterName=$DataRows["Name"];
    $Comments=$DataRows["Text"];
	$CommentDate=$DataRows["Date"];
    $CommentTime=$DataRows["Time"];
    $CommentID=$DataRows["CommentID"];
    $Flagg="<a href=\"FLAG.php?id=" . $CommentID . "\">&#xf024; </a>";
    ?>         
                      
<div class="CommentBlock">

    <img style="margin-left: 10px; margin-top: 40px;" class="pull-left" src="Pictures/comments.ico" width=70px; height=70px;>
    <p style="margin-left: 90px;" class="Comment-info"><?php echo $CommenterName; ?></p><br>
    <p style="margin-left: 90px;" class="Comment"><?php echo nl2br($Comments); ?></p><br>
        <p style="margin-left: 90px;"class="description"><?php echo $CommentDate; ?>   <?php echo $CommentTime; ?>
<form action="product.php?id=<?php echo $PostIDFromURL; ?>" method="post">
        <p class="fa" class="flagg1"  name="flagg" value="Flag"  style="margin-left: 850px; font-size:24px" onclick="return confirm('are you sure you want to Flag this comment?');"> <?php echo $Flagg?> </p>        
</form>


</div>


    <hr width=610px;>
    <?php } ?>


<br>
<?php

$ViewQuery="SELECT Name,productNo,pic FROM product ORDER BY RAND()";
    $Execute=mysqli_query($conn,$ViewQuery) or die("Error: " . mysqli_error($conn));
    while($DataRows=mysqli_fetch_assoc($Execute)){
        $productNoCheck=$DataRows["productNo"];
        $NameCheck=$DataRows["Name"];
        $imgMainCheck=$DataRows["pic"];
    }
        ?>
            <div class="section">
                <div class="section-title"><h2>Check Out More </h2></div>
                            <a href="product.php?id=<?php echo $productNoCheck?>" class="sectionProduct">
                                <div class="section-image"><img src="<?php echo $imgMainCheck?>" alt=""></div>
                                <div class="section-name"><?php echo $NameCheck?></div>
                            </a>
                </div>



            </div>
                    </div>

      
      <script>
//call after page loaded
$(window).ready(function(){
 $(".diss").load("DisCount.php?id=<?php echo $Page?>");


});


</script>






          <?php include 'footer.html';?>

</body>



  </html>