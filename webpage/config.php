<?php
$servername = "localhost";
$database = "rafalroz_pk";
$username = "rafalroz_pk";
$password = "******************";

$conn = mysqli_connect($servername, $username, $password, $database);
$conn->query("SET NAMES 'utf8'");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

?>
