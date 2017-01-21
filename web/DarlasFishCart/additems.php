<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: login.html"); /* Redirect browser */
	exit();
}
echo "array_merge13";
$cart = $_SESSION["cart"];
$fishy = $_POST["fish"];

$_SESSION["cart"] = array_merge($fishy,$cart);

header("Location: viewcart.php");
?>
