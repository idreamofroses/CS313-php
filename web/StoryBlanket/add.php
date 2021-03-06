<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: login.php"); /* Redirect browser */
	exit();
}
$username = $_SESSION["user"];
$id = (int)$_SESSION['id'];

//browse varriables
$title = htmlspecialchars($_POST['title']);
$image = htmlspecialchars($_POST['image']);
$size = (int)htmlspecialchars($_POST['size']);
$time = (int)htmlspecialchars($_POST['time']);
$story = htmlspecialchars($_POST['story']);

//database
require("dbConnect.php");
$db = get_db();

$statement = $db->prepare("INSERT INTO pattern(pattern_title, pattern_img, time_required, blanket_type, created_by, story)
VALUES(:title, :img, :time, :size, :user, :story);");
$statement->bindValue(":title", $title, PDO::PARAM_STR);
$statement->bindValue(":img", $image, PDO::PARAM_STR);
$statement->bindValue(":time", $time, PDO::PARAM_INT);
$statement->bindValue(":size", $size, PDO::PARAM_INT);
$statement->bindValue(":user", $id, PDO::PARAM_INT);
$statement->bindValue(":story", $story, PDO::PARAM_STR);
$statement->execute(); 

header("Location: myPatterns.php?name=Browse My Patterns");
die(); 

?>
