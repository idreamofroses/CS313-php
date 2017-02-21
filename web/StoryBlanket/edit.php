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
$pattern_id = (int)htmlspecialchars($_POST['pattern']);

echo $title."<br>";
echo $image."<br>";
echo $size."<br>";
echo $time."<br>";
echo $story."<br>";
echo $pattern_id;
//database
require("dbConnect.php");
$db = get_db();

$statement = $db->prepare("UPDATE pattern 
                            SET pattern_title = :title
                            ,   pattern_img = :img
                            ,   time_required = :time
                            ,   blanket_type = :size 
                            ,   story = :story
                            WHERE pattern_id = :pattern_id");
$statement->bindValue(":title", $title, PDO::PARAM_STR);
$statement->bindValue(":img", $image, PDO::PARAM_STR);
$statement->bindValue(":time", $time, PDO::PARAM_INT);
$statement->bindValue(":size", $size, PDO::PARAM_INT);
$statement->bindValue(":pattern_id", $pattern_id, PDO::PARAM_INT);
$statement->bindValue(":story", $story, PDO::PARAM_STR);
$statement->execute(); 

header("Location: myPatterns.php?name=Browse My Patterns");
die(); 

?>
