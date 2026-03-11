<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "cs_elect_02_db";

$conn = mysqli_connect($server_name, $username, $password, $db_name);
if (!$conn) {
	die("Database Not Connected" . mysqli_connect_error());
}
?>