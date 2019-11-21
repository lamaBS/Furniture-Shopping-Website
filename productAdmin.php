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
  <link href="CSS/Header.css" rel="stylesheet" type="text/css">
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

.Comment-info{
	color: #cc9900;
	font-family: sans-serif;
	font-size: 20px;;
	font-weight: bold;
	padding-top: 10px;
    text-decoration: none;

        
	
}
#flagg{
    color:red;
    text-decoration: none;

}

    </style>

  </head>
<body>



<?php include 'personal_header_admin.php';?>

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
                        <div class="product-image">
                                <div class="preview"><img src="<?php echo $imgMain?>" alt=""></div>

   
    </div>
    <div class="info"> 
                                 <br> 
                                  <div class="info-field"> <span class="product-name"><?php echo $Name?></span>

                                  </div>
                                   <div class="info-field"> <p class="product-price">$<?php echo $price ?>   &nbsp;&nbsp;<span style="text-decoration: line-through; color:gray;" class="diss"> </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp; <span><a href="DeletProduct.php?Delet=<?php echo $_GET['id'];?>" style="font-size:24px" class="fa">&#xf014;</a> &nbsp;&nbsp;<a href="EditProduct.php?Edit=<?php echo $_GET['id'];?>" style="font-size:24px" class="fa">&#xf044;</a></p>

                                   </div>
                                     
                                     <!-- <div class="info-field"> <div class="select-dropdown">
                                            <select>
                                              <option value="color">color</option>
                                              <option value="color">kjbj</option>
                                              <option value="color">kjb </option>

                                             
                                            </select>
                                                    <select>
                                                      <option value="quantity">quantity</option>
                                                      <option value="quantity">1</option>
                                                      <option value="quantity">2</option>
                                                      <option value="quantity">3</option>
                                                      <option value="quantity">4</option>
                                                    </select>
                                          </div>

                                     </div> -->
                                     <!-- <div class="info-field" >
                                            <br><br>
                                            <div class="info-field"> 
                                                    <button class="product-addtocart">Add To Cart</button>     
                                            </div>
                                    -->
                                     <br><br>                                  
                                     <br><br><br>
                                     <br><br><br>

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
    
	$PostIDFromURL=$_GET['id'];
        $Query="INSERT INTO comment (Name,Flagged,Text,Date,Time,productNo)
	VALUES ('$Name','1','$Comment','$Date','$Time','$PostIDFromURL')";
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
                            <div class="form-group" style="margin-left:110px;">
                                <label for="CommentName">Name : </label>
                                <input class="form-control" type="Name" name="Name" id="Email" placeholder="Name">
                 </div>
                 <div class="comments">
                <div class="comment-wrap">
                   <textarea name="comments" class="comment-block" cols="30" rows="3" style="width:869px;" placeholder="Add comment..."></textarea>
                                     
              </div>
        
        </div>
            
           <input class="buttonSub" type="submit" class="send-msg" value="Submit" name="submit" style="margin-left:110px;"><br>
                                </form><br>

                       <?php
$PostIdForComments=$_GET["id"];
$ExtractingCommentsQuery="SELECT * FROM comment WHERE productNo='$PostIdForComments'";
$Execute=mysqli_query($conn,$ExtractingCommentsQuery);
while($DataRows=mysqli_fetch_array($Execute)){
    $CommenterName=$DataRows["Name"];
    $Comments=$DataRows["Text"];
	$CommentDate=$DataRows["Date"];
    $CommentTime=$DataRows["Time"];
    $Flagged=$DataRows["Flagged"];
    $CommentID=$DataRows["CommentID"];
    $DELETCOMMENT="<a href=\"DeletComment.php?id=" . $CommentID . "\">&#xf00d; </a>";

    if($Flagged==1){
        $flaggg="FLAGGED";
    }
    else $flaggg=" ";



    ?>         
                      
<div class="CommentBlock" style="margin-left:110px;">

    <img style="margin-left: 10px; margin-top: 40px;" class="pull-left" src="Pictures/comments.ico" width=70px; height=70px;>
    <p style="margin-left: 90px;" class="Comment-info"><?php echo $CommenterName; ?> &nbsp;&nbsp; <span id="flagg" style="font-size:14px"> <?php echo $flaggg?> </span> <span class="fa" style="margin-left: 790px; font-size:14px" onclick="return confirm('are you sure you want to delete this comment?');">  <?php echo $DELETCOMMENT?> </spana></p><br>
    <p style="margin-left: 90px;" class="Comment"><?php echo nl2br($Comments); ?></p><br>
        <p style="margin-left: 90px;"class="description"><?php echo $CommentDate; ?>   <?php echo $CommentTime; ?>



</div>


    <hr width=610px;>
    <?php } ?>


<br>
<?php

$ViewQuery="SELECT Name,productNo,pic FROM product ORDER BY RAND()";
    $Execute=mysqli_query($conn,$ViewQuery); 
    while($DataRows=mysqli_fetch_array($Execute)){
        $productNoCheck=$DataRows["productNo"];
        $NameCheck=$DataRows["Name"];
        $imgMainCheck=$DataRows["pic"];
    }
        ?>
            <div class="section">
                <div class="section-title"><h2>Check Out More </h2></div>
                            <a href="product.php?id=<?php echo $productNoCheck?>" class="sectionProduct">
                                <div style="margin-left:60px;" class="section-image"><img src="<?php echo $imgMainCheck?>" alt=""></div>
                                <div style="margin-left:60px;" class="section-name"><?php echo $NameCheck?></div>
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