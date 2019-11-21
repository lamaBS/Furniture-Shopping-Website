
<?php
$value = $_GET['query'];
$formfield = $_GET['field'];

if ($formfield == "fname") {
	if(empty($value)){
		echo"*Please enter your first name";
	}
	else{
		$fname= test_input($value);
		if(!preg_match("/^[a-zA-Z]*$/",$fname)){
			echo"*First name can only contain letters and spaces";
		}
	}
}

	if ($formfield == "lname") {
		if(empty($value)){
			echo "*Please enter your last name";
		}
	else{
		$lname= test_input($value);
		if(!preg_match("/^[a-zA-Z]*$/",$lname)){
			echo"*Last name can only contain letters and spaces";
		}

	}
    }
	if ($formfield == "phone") {
		if(empty($value)){
			echo"*Please enter your phone number";
		}
	else {
		$phone = test_input($value);
		if(!preg_match("/^009([0-9]{10})$/",$phone)){
			echo"*Please enter your phone number in the correct format";
		}
	}
    }
    if ($formfield == "postal") {
		if(empty($value)){
			echo"*Please enter postal code";
		}
		else{
		$postal = test_input($value);
		if(!preg_match("/^[1-9][0-9]*$/",$postal)){
			echo"*Postal code should include digits only";
			}
		
		if(strlen($postal) < 4){
			echo"*Postal number is too short";
			}
		}
	}


    if ($formfield == "street") {
		if(empty($value)){
			echo"*Please enter street";
		}
    }
    if ($formfield == "building") {
		if(empty($value)){
			echo"*Please enter building number";
		}
    }
    if ($formfield == "cardName") {
		if(empty($value)){
			echo"*Please enter name on card";
		}
		else{
		$cname= test_input($value);
		if(!preg_match("/^[a-zA-Z]*$/",$cname)){
			echo"*Please enter name as written in card";
			}

		}
    }
    if ($formfield == "cardNum") {
		if(empty($value)){
			echo"*Please enter card number";
		}
		else{
		$cnumber = test_input($value);
		if(!preg_match("/^[0-9]*$/",$cnumber)){
			echo"*Please enter number of card only";
			}
		
		else if(strlen($cnumber) < 13){
			echo"*Please enter a complete card number";
			}
		}
    }
    if ($formfield == "exp_y") {
		if(empty($value)){
			echo"*Please enter card experietion date year";
		}
		else{
		$expy = test_input($value);
		if(!preg_match("/^[0-9]*$/",$expy)){
			echo"*Please enter correct card experietion date";
			}
		
		else if($value > 20|| $value < 18){
			echo"*Card is rejected, please enter another card information";
			}
		}
	}
	if ($formfield == "exp_m") {
		if(empty($value)){
			echo"*Please enter card experietion date month";
		}
		else{
		$expm = test_input($value);
		if(!preg_match("/^[0-9]*$/",$expm)){
			echo"*Please enter correct card experietion date";
			}
		
		else if($value > 12|| $value < 1){
			echo"*Please enter correct card experietion date";
			}
		}
	}

	if ($formfield == "pass1") {
		if(empty($value)){
			echo"*Please enter new password";
		}
		else{
			if (strlen($value)<'8') {
       		 echo"*Your Password Must Contain At Least 8 Characters!";
   			 }
    		elseif(!preg_match("#[0-9]+#",$value)) {
        		echo"*Your Password Must Contain At Least 1 Number!";
    		}
    		elseif(!preg_match("#[A-Z]+#",$value)) {
        		echo"*Your Password Must Contain At Least 1 Capital Letter!";
    		}
    		elseif(!preg_match("#[a-z]+#",$value)) {
        		echo"*Your Password Must Contain At Least 1 Lowercase Letter!";
    		} 
    	}
    } 	

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
