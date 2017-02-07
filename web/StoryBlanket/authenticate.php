<?php
$username = htmlspecialchars($_POST["username"]);
$userpass = htmlspecialchars($_POST["password"]);
$id = 0;
session_start();

//echo "Username: $username\n";
//echo "Pass: $userpass\n";

//database

    try
    {
        $user = 'postgres';
        $password = 'Ray@myhero7';
        $db = new PDO('pgsql:host=127.0.0.1;dbname=storyblanket', $user, $password);
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }

$stmt = $db->prepare('SELECT u.user_id
, u.username
FROM story_blanket_user u
WHERE u.username =:username
AND u.password =:pass');
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':pass', $userpass, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($rows as $row) {
        $username = $row['username'];
        $id = $row['user_id'];
    } 

$_SESSION["user"] = $username;
$_SESSION["id"] = $id;

//echo "USERNAME: $username";
//echo "ID: $id";

if($id == 0) {
    header("Location: login.php?status=unsuccesful");
} else {
    header("Location: browse.php?name=Browse All Patterns");
}

?>