<?php

//browse varriables
$fullname = htmlspecialchars($_POST['fullname']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$email = htmlspecialchars($_POST['email']);


//database
require("dbConnect.php");
$db = get_db();

echo "username: $username<br>";
echo "fullname: $fullname<br>";
echo "pass: $password<br>";
echo "email: $email<br>";

$statement = $db->prepare("INSERT INTO story_blanket_user(username, password, full_name, email)
VALUES(:username, :pass, :fullname, :email);");
$statement->bindValue(":username", $username, PDO::PARAM_STR);
$statement->bindValue(":fullname", $fullname, PDO::PARAM_STR);
$statement->bindValue(":pass", $password, PDO::PARAM_STR);
$statement->bindValue(":email", $email, PDO::PARAM_STR);
$statement->execute(); 

header("Location: login.php");
die(); 

?>
