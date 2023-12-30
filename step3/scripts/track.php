<?php
$servername = "localhost";
$username = "username";
$password = "password";
// create connection
$conn = new mysqli($servername, $username, $password);
// check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
mysqli_select_db($conn, "testdb");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$pagename = $_POST['pagenumber'];
	$cookie = "NULL";
	if (!empty($_POST['cookie'])) {
		$cookie = $_POST['cookie'];
	}
	$ip = "NULL";
	if (!empty($_POST['ip'])) {
		$ip = $_POST['ip'];
	}
	$width = "NULL";
	if (!empty($_POST['width'])) {
		$width = $_POST['width'];
	}
	$height = "NULL";
	if (!empty($_POST['height'])) {
		$height = $_POST['height'];
	}
	$useragent = "NULL";
	if (!empty($_POST['useragent'])) {
		$useragent = $_POST['useragent'];
	}
	$cookies = "NULL";
	if (!empty($_POST['cookies'])) {
		$cookies = $_POST['cookies'];
	}
	$abyss = "NULL";
	if (!empty($_POST['abyss'])) {
		$abyss = $_POST['abyss'];
	}
	$deja = "NULL";
	if (!empty($_POST['deja'])) {
		$deja = $_POST['deja'];
	}
	$gfs = "NULL";
	if (!empty($_POST['gfs'])) {
		$gfs = $_POST['gfs'];
	}
	$liberation = "NULL";
	if (!empty($_POST['liberation'])) {
		$liberation = $_POST['liberation'];
	}
	$roboto = "NULL";
	if (!empty($_POST['roboto'])) {
		$roboto = $_POST['roboto'];
	}
	$js = "true";
	$sql = "INSERT INTO visits VALUES ('"
	. $pagename . "', "
	. $cookie . ", '"
	. $ip . "', "
	. $width . ", "
	. $height . ", '"
	. $useragent . "', "
	. $cookies . ", "
	. $abyss . ", "
	. $deja . ", "
	. $gfs . ", "
	. $liberation . ", "
	. $roboto . ", "
	. $js . ");";
	echo $sql;
	if ($conn->query($sql) === TRUE) {
		echo "Database entry successful!";
	} else {
		die("Database entry failed!");
	}
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
	$components = explode("/", $_SERVER["HTTP_REFERER"]);
	$page = array_pop($components);
	while ($page == "") {
		$page = array_pop($components);
	}
	$sql = "INSERT INTO visits VALUES ('"
	. $page . "', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,
	NULL, FALSE);";
	if ($conn->query($sql) === TRUE) {
		echo "Database entry successful!";
	} else {
		die("Database entry failed!");
	}
}
mysqli_close($conn);
?>
