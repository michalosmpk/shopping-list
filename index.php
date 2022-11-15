<?php 
	require_once('header.php');
	if(isset($_POST['login-button'])) {
		header('Location: login.php');
	}
	// if(isset($_POST['new-listing-button']) && !empty($_POST['new-listing-input'])) {
	// 	$conn->query('INSERT INTO list (listing_name) VALUES (\''.$_POST['new-listing-input'].'\')');
	// 	unset($_POST);
	// 	header('Location: index.php');
	// }
	// if(isset($_POST['delete-listing-button'])) {
	// 	echo $_POST['delete-listing-button'];
	// 	$conn->query('DELETE FROM list WHERE list.listing_id = '.$_POST['delete-listing-button']);
	// 	unset($_POST);
	// 	header('Location: index.php');
	// }
	
	// $result = $conn->query('select * from users;')->fetch_all();
	// PRINTR($result);
	// exit; 
?>

<menu class="sidepanel">
	<form method="post">
		<nav>
			<button type="submit" name="login-button">
				<span class="login-button">Zaloguj się</span>
			</button>
		</nav>
		<nav>Lista 1</nav>
		<nav>Lista 2</nav>
	</form>
</menu>
<header class="header">
	<button class="hamburger hamburger--spin" type="button">
		<span class="hamburger-box">
			<span class="hamburger-inner"></span>
		</span>
	</button>
	Shopping List
</header>
<content>
	<form class="new-listing" method="post">
		<input type="text" name="new-listing-input" id="" class="" maxlength="255">
		<button type="submit" name="new-listing-button">
			<span class="new-listing__plus"></span>
		</button>
	</form>
	<form class="shopping-list" method="post">
		<?php 
			// $count = 1;
			// $result = $conn->query('select * from list;')->fetch_all(); 
			// foreach( $result as $row) {
				?>
				<div class="shopping-list__listing">
					<p class="shopping-list__paragraph">
						<?php
							// echo $count++.'.';
							// echo $row[1];
						?>
						1.Test listing
					</p>
					<button type="submit" name="delete-listing-button" value="<?php // echo $row[0];?>">
						<span class="delete-listing-button__minus"></span>
					</button>
				</div>
				<?php
			//}
		?>
	</form>
</content>
<?php
	echo password_hash("admin", PASSWORD_BCRYPT);
?>
<script src="assets/js/main.js"></script>

<?php require_once('footer.php'); ?>

