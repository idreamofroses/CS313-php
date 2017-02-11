<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: login.php"); /* Redirect browser */
	exit();
}
$username = $_SESSION["user"];
$id = (int)$_SESSION['id'];

//browse varriables
$name = htmlspecialchars($_GET['name']);
$pattern_id = htmlspecialchars($_GET['pattern']);


require("dbConnect.php");
$db = get_db();

$statement = $db->prepare("INSERT INTO saved_pattern(user_id, pattern_id)VALUES(:user, :pattern_id);");
$statement->bindValue(":user", $id, PDO::PARAM_INT);
$statement->bindValue(":pattern_id", $pattern_id, PDO::PARAM_INT);
$statement->execute(); 

header("Location: browse.php?name=$name");
die();

?>
