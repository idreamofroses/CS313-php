<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: login.html"); /* Redirect browser */
	exit();
}
$cart = $_SESSION["cart"];

foreach($cart as $item) {  
   $key = array_search($item,$cart);
    $_SESSION["cart"][$key] = "0";
} 


header("Location: browse.php");
?>
