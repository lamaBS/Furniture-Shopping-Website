<?php
session_start();
include 'db.php';
session_destroy();
unset($_SESSION['email']);
$_SESSION['message']="you logout susscfully .. bay";
header('Location:Homepage.php');

?>