<?php

//browse varriables
$fullname = htmlspecialchars($_POST['fullname']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$email = htmlspecialchars($_POST['email']);

$hashPassword = password_hash($password, PASSWORD_DEFAULT);

echo $hashPassword;
//database
require("dbConnect.php");
$db = get_db();

$statement = $db->prepare("INSERT INTO story_blanket_user(username, password, full_name, email)
VALUES(:username, :pass, :fullname, :email);");
$statement->bindValue(":username", $username, PDO::PARAM_STR);
$statement->bindValue(":fullname", $fullname, PDO::PARAM_STR);
$statement->bindValue(":pass", $hashPassword, PDO::PARAM_STR);
$statement->bindValue(":email", $email, PDO::PARAM_STR);
$statement->execute();  

header("Location: login.php");
die(); 

?>
