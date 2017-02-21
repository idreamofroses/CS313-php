<?php

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
session_start();

//database

require("dbConnect.php");
$db = get_db();


$stmt = $db->prepare('SELECT u.password, u.user_id
                      FROM story_blanket_user u
                      WHERE u.username =:username');
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch();

if(password_verify($password, $user['password'])) {
        $_SESSION['user'] = $username;
        $_SESSION["id"] = $user['user_id'];
        header("Location: browse.php?name=Browse All Patterns");
        die();
    } else {
        header("Location: login.php?status=unsuccesful");
        die();
    }

?>