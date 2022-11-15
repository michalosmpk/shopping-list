<?php require_once('header.php') ?>
<?php 
// error displaying (dev only)
ini_set('display_errors', 'On');
error_reporting(E_ALL);

?>
<header class="header">
	Shopping List
</header>

<!-- <form> -->
	<div class="login-container">
		<div class="login-panel">
			<p>Zaloguj się</p>
			<input	id="login-email-input" 		class="login-panel__email"		type="text" 	placeholder="example@gmail.com">
			<input	id="login-password-input"	class="login-panel__password"	type="password" placeholder="Password">
			<div class="login-panel__checkbox-holder">
				<input	id="login-remember-input"	type="checkbox">
				Zapamiętaj mnie
			</div>
			<button id="login-button" type="submit" class="login-panel__login-button" onclick="loginUser('')">
				Login
				<div id="login-button-success-icon" class="login-panel__login-button__success-icon">
					<div class="login-panel__login-button__success-icon__tip"></div>
					<div class="login-panel__login-button__success-icon__long"></div>
				</div>
			</button>
		</div>
	</div>
<!-- </form> -->

<script src="assets/js/login.js"></script>
<?php
	// ALERT(PRINTR($_COOKIE));
?>
<?php require_once('footer.php') ?>