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
$pattern_id = htmlspecialchars($_GET["pattern"]);

//database

require("dbConnect.php");
$db = get_db();

//DELETE FROM saved_pattern WHERE user_id =:user_id AND pattern_id=:pattern_id

$statement = $db->prepare("DELETE FROM saved_pattern WHERE user_id =:user_id AND pattern_id=:pattern_id");
$statement->bindValue(":user_id", $id, PDO::PARAM_INT);
$statement->bindValue(":pattern_id", $pattern_id, PDO::PARAM_INT);
$statement->execute(); 

header("Location: favorites.php?name=$name");
die(); 

?>

