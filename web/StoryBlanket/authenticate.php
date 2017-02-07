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
       // $user = 'postgres';
       // $password = 'Ray@myhero7';
       // $db = new PDO('pgsql:host=127.0.0.1;dbname=storyblanket', $user, $password);
        
        $dbUrl = getenv('postgres://rpdblhqsnnjkab:65a4ba798295b69ce1a2d2dd984c7debf0a9783d8ab46388367cb75aedb0a431@ec2-23-23-93-255.compute-1.amazonaws.com:5432/d72ipoofbb416q'); 

        $dbopts = parse_url($dbUrl);

        $dbHost = $dbopts["host"];
        $dbPort = $dbopts["port"];
        $dbUser = $dbopts["user"];
        $dbPassword = $dbopts["pass"];
        $dbName = ltrim($dbopts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
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