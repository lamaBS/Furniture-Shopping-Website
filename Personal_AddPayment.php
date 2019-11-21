<?php

    include 'isLogged.php';
    ?>
<html>

<head>
<title>My Account | FORTUNERS</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Nova+Mono">
      <link href="CSS\Personal_payment.css" rel="stylesheet" type="text/css">
      <link href="CSS\Personal_navigationbar.css" rel="stylesheet" type="text/css">
     <script src="js\validation.js"></script>
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
                    <a href ="Personal_AddressBook.php">ADDRESS BOOK</a>
                </li>  <li>
                      <a class="active">PAYMENT</a>
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
                 <div class="panel">
                     <div class="panel-heading">PAYMENT</div>
                     <div class="panel-body"><!--content-->
                        <h3 >Add Payment method</h3>
                         <img class="img-responsive pull-right" style="margin-top: -55px;" src="Pictures/Cards.png">
                         <form role="form" id="payment-form" method="POST" action="insertPayment.php">

                           <label for="cardName">NAME ON CARD</lable><br>
                           <input type="text" id="cardName" name="cardName"
                           placeholder="e.g. James Michaels" maxlength="30" onblur="validate('cardName', this.value);" required/>
                           <span id="err_cardName" class="error"></span>
                           <br>


                           <div class="form-group">
                            <label for="cardNumber">CARD NUMBER</label>
                            <div class="input-group">
                             <input type="tel" id="cardNum" class="form-control" name="cardNumber"
                             maxlength="16" onblur="validate('cardNum', this.value);" required>
                             <span class="input-group-addon">
                             <i class="fa fa-credit-card"></i></span>
                             <span id="err_cardNum" class="error"></span>
                            </div>
                          </div>
                          <br>
                          <div class="form-group">
                           <label for="cardExpiry">EXPIRATION DATE</label><br>
                           <input type="tel" id="exp_m"  class="form-control" name="exp_m" placeholder="MM" onblur="validate('exp_m', this.value);" required>
                           <input  type="tel" id="exp_y" class="form-control" name="exp_y" placeholder="YY" onblur="validate('exp_y', this.value);" required>
                           <span id="err_exp_m" class="error"></span>
                           <span id="err_exp_y" class="error"></span>
                          </div>
                          <br>
                          <input class="subscribe button" type="submit" value="ADD PAYMENT" onclick="return checkPaymentForm()"></input>
                          <div class="row" style="display:none;">
                            <p class="payment-errors"></p>
                           </div>
                        </form>


                                   <!-- CREDIT CARD FORM ENDS HERE -->


<!--end content-->
                     </div>
                    </div>
                </div>
<?php include 'footer.html';?>
<script>
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
