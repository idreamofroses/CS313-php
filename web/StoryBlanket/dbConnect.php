<?php
function get_db() {
	$dbUrl = getenv('HEROKU_POSTGRESQL_ORANGE_URL');
	if (empty($dbUrl)) {
		$dbUser = "blanket_user";
		$dbPassword = "story";
		$dbPort = "5432";
		$dbHost = "localhost";
		$dbName = "storyblanket";
	} else {
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
	return $db;
}
?>