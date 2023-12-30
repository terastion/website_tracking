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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$pagename = $_POST['pagenumber'];
	$cookie = "NULL";
	$ip = "NULL";
	$width = "NULL";
	$height = "NULL";
	$useragent = "NULL";
	$cookies = "NULL";
	$abyss = "NULL";
	$deja = "NULL";
	$gfs = "NULL";
	$lib = "NULL";
	$robo = "NULL";
	$js = "NULL";
	mysqli_select_db($conn, "testdb");
	$sql = "INSERT INTO visits VALUES ('"
	. $pagename . "', "
	. $cookie . ", "
	. $ip . ", "
	. $width . ", "
	. $height . ", "
	. $useragent . ", "
	. $cookies . ", "
	. $abyss . ", "
	. $deja . ", "
	. $gfs . ", "
	. $lib . ", "
	. $robo . ", "
	. $js . ");";
	if ($conn->query($sql) === TRUE) {
		echo "Database entry successful!";
	} else {
		die("Database entry failed!");
	}
}
mysqli_close($conn);
echo "Connected successfully!";
?>
