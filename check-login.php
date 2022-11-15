<?php
	require_once('db.php');
	require_once('functions.php');
	$result = $conn->query("SELECT password, user_id FROM users WHERE email = '".$_POST['email']."'")->fetch_row();
	$db_password = $result[0];
	$user_id = $result[1];
	// echo $_POST['password'];
	if(!empty($db_password) && password_verify($_POST['password'], $db_password)) {
		echo $_POST['remember'];
		if($_POST['remember']) {
			$conn->query("DELETE FROM `logged_in` WHERE user_id='".$user_id."'");
			$conn->query("INSERT INTO `logged_in` (`browser_id`, `user_id`) VALUES ('".$_COOKIE['browser_id']."', '".$user_id."')");
			setcookie("user_id", $user_id, strtotime( '+365 days'));
			$_SESSION['user_id'] = $user_id;
			echo true;
		} else {
			$_SESSION['user_id'] = $user_id;
			echo true;
		}
	} else {
		echo false;
	}
	// return json_encode(array("status" => true, "added" => true));
?>