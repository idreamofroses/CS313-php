<?php
echo "php loaded";
function get_db() {
	$dbUrl = "postgres://rpdblhqsnnjkab:65a4ba798295b69ce1a2d2dd984c7debf0a9783d8ab46388367cb75aedb0a431@ec2-23-23-93-255.compute-1.amazonaws.com:5432/d72ipoofbb416q";
    echo "URL: $dbUrl";
	if (empty($dbUrl)) {
		$dbUser = "blanket_user";
		$dbPassword = "story";
		$dbPort = "5432";
		$dbHost = "localhost";
		$dbName = "storyblanket";
        echo "here";
	} else {
        echo "success";
		$dbopts = parse_url($dbUrl);
		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');
	}
	try {
	 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	}
	catch (PDOException $ex) {
	 print "<p>error: $ex->getMessage() </p>\n\n";
	 die();
	}
//	return $db;
}
?>