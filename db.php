<?php
	include_one('db_pass.php');
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "shopping-list";
	// $dbname = "shopping_list-basic";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	// echo "Connected successfully";
?>