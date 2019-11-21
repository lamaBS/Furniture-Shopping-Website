<?php

    include 'isLogged.php';
    ?>
<html>

<head>
<title>My Account | FORTUNERS</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nova+Mono">
<link href="CSS/Personal_navigationbar.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/validation.js"></script>
</head>
<body>
<?php include 'Personal_header.php';?>
<div class="navigationbar">
<div class="container">
  <div class="row">
    <div class="wrapper">
          <div class="side-bar">

            <ul>
              <li class="menu-head"><h3> MY ACCOUNT</h3></li>
              <div class="menu">
                <li>
                  <a  href ="Personal_info.php">INFORMATION</a>
              </li>
                <li>
                     <a class="active" href ="Personal_AddressBook.php">ADDRESS BOOK</a>
                </li>  <li>
                      <a href ="Personal_Payment.php">PAYMENT</a>
                  </li>
                <li>
                    <a href ="Personal_Password.php">PASSWORD</a>
                </li>
                <li>
                    <a href ="Personal_orders.php">ORDERS</a>
                </li>

                    </div>

                </ul>
          </div>

            <div class="content">
              <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">ADDRESS BOOK</div>
                     <div class="panel-body">
                     <!--Content-->
                       <div class="address">
<form method="POST" action="insertAddress.php">
<lable>COUNTRY</lable>
<select id="country" name= 'country' required onchange='changeCity()'>
  <option value="Saudi Arabia">Saudi Arabia</option>
  <option value="United Arab Emirates">United Arab Emirates</option>
  <option value="Qatar">Qatar</option>
  <option value="Bahrain">Bahrain</option>
  <option value="Kuwait">Kuwait</option>
  <option value="Oman">Oman</option>
</select>
<lable>CITY</lable>
<select id="city" name='city' required></select>
<br><br>
<div>
<lable for="postal">POSTAL CODE</lable>
<input id="postal" type="text" name="postal" maxlength="5" value="" required onblur="validate('postal', this.value)">
</input>
<p id="err_postal" class="error" ></p>
</div>
<div>
<lable for="street">STREET</lable>
<input id="street" type="text" name="street" value="" required onblur="validate('street', this.value)">
</input>
<p id="err_street" class="error" ></p>
</div>
<div>
<lable for="building">BUILDING NO.</lable>
<input id="building" type="text" name="building" value="" required onblur="validate('building', this.value)">
</input>
<p id="err_building" class="error" ></p>
</div>
<input type="submit" class="button" name="addAddress" value="ADD ADDRESS" onclick="return checkAddressForm()"></input>

</form>
</div>


                     <!--end of content-->
                    </div>
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
   $(document).ready(function(){
    changeCity();
  });
   function changeCity(){
    var value =$("#country").val();
   switch(value){
case"Saudi Arabia":
  $( "#city" ).load("cities/ksa.html");
  break;

case "United Arab Emirates":
  $( "#city" ).load("cities/uae.html");
  break;

case "Qatar":
  $( "#city" ).load("cities/qatar.html");
  break;

case "Bahrain":
  $( "#city" ).load("cities/bahrain.html");
  break;

case "Kuwait":
  $( "#city" ).load("cities/kwe.html");
  break;

case "Oman":
  $( "#city" ).load("cities/oman.html");
  break;
}
}
  $('form').find('input').keypress(function(e){
    if( e.which==13)
    {
        $(this).next().focus();
        return false;
    }
});
</script>
</body>
</html>
