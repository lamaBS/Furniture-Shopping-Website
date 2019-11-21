
<?php

include 'isLogged.php';


$conn = mysqli_connect("localhost","WEB","123123","fortuners") or die("Connection failed: " . mysqli_connect_error());


$SerachQueryParameter=$_GET['Edit'];

$ViewQuery="SELECT * FROM product WHERE productNo='$SerachQueryParameter'";

$result = mysqli_query($conn, $ViewQuery);


while($DataRows=mysqli_fetch_array($result)){
    $NameToBeUpdated=$DataRows["Name"];
   $priceToBeUpdated=$DataRows["price"];
   $descriptionToBeUpdated=$DataRows["description"];
//    $StockToBeUpdated=$DataRows['inStock'];
   $imgMainToBeUpdated=$DataRows["pic"];
   $discountToBEUpdated=$DataRows["discount"];


}
                                     $PostIdForColor=$_GET["Edit"];
                                     $ExtractingColor="SELECT * FROM productcolor WHERE productNo='$PostIdForColor'";
                                     $Execute=mysqli_query($conn,$ExtractingColor);
                                     $DataRows=mysqli_fetch_array($Execute);
                                        $color1=$DataRows['color'];
                                        $stock1=$DataRows['stock'];
                                        $colorID1=$DataRows['colorID'];
                                     $DataRows=mysqli_fetch_array($Execute);
                                        $color2=$DataRows['color'];
                                        $stock2=$DataRows['stock'];
                                        $colorID2=$DataRows['colorID'];
                                   
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



<html>

<head>
<title> FORTUNERS | Edit Product</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Nova+Mono">
      <link href="CSS/Header.css" rel="stylesheet" type="text/css">
      <link href="CSS/Footer.css" rel="stylesheet" type="text/css">
      <link href="CSS/Editproduct.css" rel="stylesheet" type="text/css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


      <style>
      #stock{
width:30px;       }
      </style>



</head>
<?php include 'personal_header_admin.php';?>

<body>
        <div class="navigationbar">
                <div class="container">
        <div class="row">
                <div class="wrapper">
                    <h2> Edit Product </h2>
                   
                    
                    
     
            
        
                    <form id="confirm" action="Update.php?Edit=<?php echo $SerachQueryParameter; ?>" method="post" enctype="multipart/form-data">
                        <div class="img">
                                <br>  <label for="Image"> Product Images : </label><br>
                            <br>
                            
                             <img src="<?php echo $imgMainToBeUpdated;?>" width=170px; height=150px; style="margin-left:20px;"><br><br>
                             <label for="SelectImages"> Select Images : </label><br>
                             <br>
                             <input  type="file" class="form-control" name="Image1" id="Imageselect1" ><br>
                             <input type="hidden" name="imagestatic" value="<?php echo $imgMainToBeUpdated;?>">

                             
   
    </div>

    
    <div class="form">
                                 <br>  <label for="name"> Product Name</label><br>
                                    <input value="<?php echo $NameToBeUpdated; ?>" type="text" name="Name"  id="name" required>
                                   <br>
                                   <br>
                                   <label for="price"> Product Price</label><br>
                                     <input value="<?php echo $priceToBeUpdated; ?>" type="text" name="price"  id="price" required>
                                     <br><br>
                                     <label for="color"> Product colors </label><br>
                                     
                                     <input value="<?php echo $color1; ?>" type="text" name="color1" id="color" > 
                                     <input id="colorID1" name="colorID1" type="hidden" value="<?php echo $colorID1 ?>">

                                     
                                     <input value="<?php echo $color2; ?>" type="text" name="color2" id="color2" > 
                                     <input id="colorID2" name="colorID2" type="hidden" value="<?php echo $colorID2 ?>">

                                     <?php
                                        
                                     ?>
                                     <input value="<?php echo $color3; ?>" type="text" name="color<?php echo $colorID?>" id="color3" > 
                                     <input id="colorID3" name="colorID3" type="hidden" value="<?php echo $colorID3 ?>">


                                     
                                     <br><br>
                                     
                                     <br><br>
                                     
                                     <label for="discount"> Add discount</label><br>
                                     <input value="<?php echo $discountToBEUpdated;?>" type="text" name="discount" id="discount" >
                                     <br><br>
                                     <label for="description"> Product description</label><br>
                                     <textarea rows="4" cols="50" name="description" style="color:black;"><?php echo htmlspecialchars($descriptionToBeUpdated); ?></textarea>       <br><br><br><br>
                                            </div>

                                            <input class="btn btn-success btn-block" type="submit" value="Update" name="submit" id="btn" onclick="return confirm('are you sure you want to Update this?');" >

                </form>
            
        
                       
                <!-- <script>
    $("#confirm").submit(function() {
        alert("are you sure you want to update");
        $("input[type='submit']").val("Update");
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
    <script>
      $('form').find('input').keypress(function(e){
          if(e.which==13){
              $(this).next().focus();
              return false;
          }
      });
    </script>

</div>
</body>
</html>
