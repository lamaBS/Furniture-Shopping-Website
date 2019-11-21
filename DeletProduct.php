
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


if(isset($_POST["submit"])){



$DeleteID=$_GET['Delet'];


$QueryCheck="SELECT * FROM orderitem WHERE productNo='DeleteID'";


// $count= mysqli_num_rows($OrderItemCheck);

if(!($OrderItemCheck=mysqli_query($conn,$QueryCheck)))
{
    echo "<script type='text/javascript'>alert('Sorry you can not delet this product becuse its already in order Item!');</script>";

}
else{

// $query1="SELECT catID FROM product WHERE productNo='$DeleteID'";
// $result = mysqli_query($conn,$query1);

// $DataRows=mysqli_fetch_array($result);
// $catID=$DataRows['catID'];

$Query="DELETE FROM product
WHERE productNo='$DeleteID'";



// $commentQuery=

// $Execute=mysqli_query($conn,$Query);
if(!($result = mysqli_query($conn,$Query)))
{
    print ("<p>Could not execute query!</p>");}

    header("Location:AdminPage.php");}

        
    }

	
    ?>
<head>
<title>FORTUNERS | Delete Product </title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Nova+Mono">
      <link href="css/Header.css" rel="stylesheet" type="text/css">
      <link href="css/Footer.css" rel="stylesheet" type="text/css">
      <link href="css/Editproduct.css" rel="stylesheet" type="text/css">
      <script src="js/bootstrap.min.js"></script>



      <style>
input , textarea{
    background-color:#D8D8D8;
}

#del{
    background-color:white;

}

</style>

</head>

<?php include 'personal_header_admin.php';?>


 <div class="navigationbar">
                <div class="container">
        <div class="row">
                <div class="wrapper">
                    <h2> Delete Product </h2>
                   
                    
                    
                    <?php 
                    $SerachQueryParameter=$_GET['Delet'];

                    $ViewQuery="SELECT * FROM product WHERE productNo='$SerachQueryParameter'";
                    $Execute=mysqli_query($conn,$ViewQuery);
                while($DataRows=mysqli_fetch_array($Execute)){
                $NameToDelet=$DataRows["Name"];
	       		$priceToDelet=$DataRows["price"];
               $descriptionToDelet=$DataRows["description"];
               $imgMainToDelet=$DataRows["pic"];
              $discountToDelet=$DataRows["discount"];
              $catID=$DataRows["catID"];
    }
    
    
   
?>

   
        
                    <form id="delete" action="DeletProduct.php?Delet=<?php echo $SerachQueryParameter; ?>" method="POST" enctype="multipart/form-data">
                        <div class="img">
                                <br>  <label for="Image"> Product Images : </label><br>
                            <br>
                             <label for="SelectImages"> Existing Image : </label><br>
                             <br>
                             <img src="<?php echo $imgMainToDelet;?>" width=170px; height=150px;><br>

                             
   
    </div>
    <div class="form">
                                 <br>  <label for="name"> Product Name</label><br>
                                    <input disabled value="<?php echo $NameToDelet; ?>" type="text" name="Name"  id="name">
                                   <br>
                                   <br>
                                   <label for="price"> Product Price</label><br>
                                     <input disabled value="<?php echo $priceToDelet; ?>" type="text" name="price"  id="price" >
                                     <br><br>
                                     <label for="color"> Product color1 </label><br>
                                     <?php 
                                     $PostIdForColor=$_GET["Delet"];
                                     $ExtractingColor="SELECT * FROM productcolor WHERE productNo='$PostIdForColor'";
                                     $Execute=mysqli_query($conn,$ExtractingColor);
                                     while($DataRows=mysqli_fetch_array($Execute)){

                                        $color1=$DataRows['color'];
                                        $stock1=$DataRows['stock'];
                                        $colorID1=$DataRows['colorID'];

                                        
                                     ?>
                                     <input disabled value="<?php echo $color1; ?>" type="text" name="color1" id="color" > <input value="<?php echo $stock1; ?>" type="text" name="stock1" id="stock" >
                                     <input disabled id="colorID1" name="colorID1" type="hidden" value="<?php echo $colorID1 ?>">

                                     <?php }?>
                                     <?php 
                                     while($DataRows=mysqli_fetch_array($Execute)){

                                        $color2=$DataRows['color'];
                                        $stock2=$DataRows['stock'];
                                        $colorID2=$DataRows['colorID'];
                                     ?>
                                     <input disabled value="<?php echo $color2; ?>" type="text" name="color2" id="color2" > <input value="<?php echo $stock2; ?>" type="text" name="stock2" id="stock" >
                                     <input disabled id="colorID2" name="colorID2" type="hidden" value="<?php echo $colorID2 ?>">

                                     <?php }?>
                                     <?php
                                     if($DataRows=mysqli_fetch_array($Execute)){

                                        $color3=$DataRows['color'];
                                        $stock3=$DataRows['stock'];
                                        $colorID3=$DataRows['colorID'];

                                    }
                                        else{

                                        $color3=" ";
                                        $stock3=0;
                                        $colorID3=0;

                                    }
                                        
                                        
                                     ?>
                                     <input disabled value="<?php echo $color3; ?>" type="text" name="color<?php echo $colorID?>" id="color3" > <input value="<?php echo $stock3; ?>" type="text" name="stock3" id="stock" >
                                     <input disabled id="colorID3" name="colorID3" type="hidden" value="<?php echo $colorID3 ?>">


                                     
                                     <br><br>
                                     
                                     <br><br>
                                     <label for="discount"> Add discount</label><br>
                                     <input disabled value="<?php echo $discountToDelet;?>" type="text" name="discount" id="discount" >
                                     <br><br>
                                     <label for="description"> Product description</label><br>
                                     <textarea disabled rows="4" cols="50" name="description" form="usrform">
                                     <?php echo $descriptionToDelet; ?>
                                    </textarea>       <br><br><br><br>
                                            </div>

                                            <input id="del"  type="submit" value="DELETE" name="submit" onclick="return confirm('are you sure you want to delete this?');">
                                        
                               
                            
                </form>
<!--                
                <script>
    $("#delete").submit(function() {
        alert("are you sure you want to update");
        $("input[type='submit']").val("text 2");
        return false;
    }
});
</script> -->
        
        
        
        
        
                             <!--end of content-->
        
                        </div>
                    </div>






    
</body>
                     </div>
                    </div>
                </div>
            </div>

		</div>
	</div>
</div>
</div>


    <?php include 'footer.html';?>

</div>
</body>
</html>
