<html>
<head>
<title>FORTUNERS</title>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}


function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script>
<style>
* {box-sizing: border-box}

.mySlides {display: none}
img {vertical-align: middle;
}

/* Slideshow container */
.slideshow-container {
  max-width: 750px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: #cc9900;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,.next:hover {
background-color:#d6d6c2;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #b38600;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #d6d6c2;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>
<body>
    <?php

    include 'personal_header.php';
     ?>

<img src="Pictures\sale70.gif">

<div class="slideshow-container">



  <?php
 $servername = "localhost";
 $username = "root";
 $password = "";


 $conn = mysqli_connect($servername, $username, $password);
 $coon=mysqli_select_db($conn,"fortuners");


         $sql = "SELECT pic FROM product ORDER BY sold DESC LIMIT 3;";
         $result = mysqli_query($conn, $sql);
 if (!$result) {
   die(mysqli_error($conn));
 }  $resultCheck= mysqli_num_rows($result);
 if($resultCheck>0){
   while($row = mysqli_fetch_array($result)){
                         $img= $row['pic'];


 ?>





 <div class="mySlides fade">
   <img src="<?=$img?>" style="padding-left:10%;">
 </div>

   <?php
   }

   }
   ?>



 <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
 <a class="next" onclick="plusSlides(1)">&#10095;</a>

 </div>
 <br>

 <div style="text-align:center">

   <span class="dot" onclick="currentSlide(1)"></span>
   <span class="dot" onclick="currentSlide(2)"></span>
   <span class="dot" onclick="currentSlide(3)"></span>
 </div>



  <?php
  include('footer.html');
   ?>


</body>
</html>
