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




if(isset($_POST["submit"])){

    $Name=$_POST["Name"];
    $Price=$_POST["price"];
    $discount= $_POST["discount"]/100;
    if($discount === 0){
    $NewPrice=$Price;}
    else{
        $NewPrice=$Price*$discount;
    }
    $color1=$_POST["color1"];
    $colorID1=$_POST["colorID1"];
    $stock1=$_POST["stock1"];
    $color2=$_POST["color2"];
    $colorID2=$_POST["colorID2"];
    $stock2=$_POST["stock2"];
    $color3=$_POST["color3"];
    $colorID3=$_POST["colorID3"];
    $stock3=$_POST["stock3"];

    $imagestatic=$_POST["imagestatic"];

    $description=htmlspecialchars($_POST['description']);

    // $Image1=$_FILES['Image1']['name'];
    
    if (is_uploaded_file($_FILES['Image1']['tmp_name'])){
        $Image1=$_FILES['Image1']['name'];
    
    }
    else{
        $Image1=substr("$imagestatic",6);


    }
    $EditFromURL=$_GET['Edit'];
    

// move_uploaded_file($_FILES["Image1"]["tmp_name"],$target);

$Query="UPDATE product SET Name='$Name', price='$NewPrice',
 description='$description', discount='$discount',pic='photo/$Image1'
WHERE productNo='$EditFromURL'";

$result = mysqli_query($conn, $Query) or trigger_error(mysqli_error()." in ".$result);



$q1="UPDATE productcolor SET color='$color1' WHERE colorID='$colorID1'";


$Execute1=mysqli_query($conn,$q1) or trigger_error(mysql_error()." in ".$Execute1);


$q2="UPDATE productcolor SET color='$color2' WHERE colorID='$colorID2'";

$Execute2=mysqli_query($conn,$q2) or trigger_error(mysql_error()." in ".$Execute2);


$q3="UPDATE productcolor SET color='$color3' WHERE colorID='$colorID3'";

$Execute3=mysqli_query($conn,$q3) or trigger_error(mysql_error()." in ".$Execute3);






//  $DeleteQuery2="DELETE FROM productcolor WHERE productNo='$EditFromURL'";
// $Execute1=mysqli_query($conn,$DeleteQuery2) or trigger_error(mysql_error()." in ".$Execute1);

// $Query2="INSERT INTO productcolor (color,productNo)
// VALUES ('$color1','$EditFromURL')";
// $Execute2=mysqli_query($conn,$Query2) or trigger_error(mysql_error()." in ".$Execute2);

// $Query3="INSERT INTO productcolor (color,productNo)
// VALUES ('$color2','$EditFromURL')";

// $Execute3=mysqli_query($conn,$Query3) or trigger_error(mysql_error()." in ".$Execute3);





header("Location:EditProduct.php?Edit=$EditFromURL");}

?>
