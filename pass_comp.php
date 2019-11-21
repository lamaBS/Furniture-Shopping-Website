
<?php
$second = $_GET['second'];
$first = $_GET['first'];
		if(empty($first)){
			echo"*Please enter a new password";
		}
		elseif(empty($second)){
			echo"*Please repeate entered password";
		}
		elseif($first != $second) {
		echo"*Please enter matching passwords";
		}

?>
