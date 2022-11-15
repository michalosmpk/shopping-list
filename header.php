<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping List</title>
	<link rel="apple-touch-icon" sizes="152x152" href="/assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="/assets/favicon/site.webmanifest">
	<link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/login.css">
	<link rel="stylesheet" href="assets/css/hamburger.css">
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
	<?php
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
		require_once('functions.php');
		require_once('db.php');
		

		// adding browser id if it doesn't exist yet
		if(!isset($_COOKIE['browser_id'])) {
			$unique_id = true;
			while($unique_id) {
				$browser_id_generated = rand(1000000000, 9999999999);
				$result = $conn->query("SELECT browser_id FROM browsers WHERE browser_id='".$browser_id_generated."'")->fetch_assoc();
				if(empty($result)) {
					$unique_id = false;
				}
			}
			$conn->query("INSERT INTO `browsers` (`browser_id`) VALUES ('".$browser_id_generated."');");
			setcookie("browser_id", $browser_id_generated, strtotime( '+9999 days'));
			$_COOKIE['browser_id'] = $browser_id_generated;
		}
		
		if(!isset($_COOKIE['user_id'])) {
			setcookie("user_id", false, strtotime( '+9999 days'));
			$_COOKIE['user_id'] = false;
		}

		// checking if user is already logged in
		if(isset($_COOKIE['user_id'])) {
			$result = $conn->query("SELECT user_id FROM logged_in WHERE browser_id='".$_COOKIE['browser_id']."'")->fetch_assoc();
			if(!empty($result) && $_COOKIE['user_id'] == $result['user_id']) {
				$_SESSION['user_id'] = $result['user_id'];
				$_SESSION['logged_in'] = true;
			} else {
				$_SESSION['logged_in'] = false;
				setcookie("user_id", false, strtotime( '+365 days'));
				if($_SERVER['REQUEST_URI'] != '/login.php') {
					header('Location: login.php');
				}
			}
		} else if (!isset($_SESSION['user_id'])){
			if($_SERVER['REQUEST_URI'] != '/login.php') {
				header('Location: login.php');
			}
		}
	?>