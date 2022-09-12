<!DOCTYPE html>
<html lang="en">
<?php 
	require_once('db.php');
	if(isset($_POST['new-listing-button']) && !empty($_POST['new-listing-input'])) {
		$conn->query('INSERT INTO list (listing_name) VALUES (\''.$_POST['new-listing-input'].'\')');
		unset($_POST);
		header('Location: index.php');
	}
	if(isset($_POST['delete-listing-button'])) {
		echo $_POST['delete-listing-button'];
		$conn->query('DELETE FROM list WHERE list.listing_id = '.$_POST['delete-listing-button']);
		unset($_POST);
		header('Location: index.php');
	}

?>
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
	<link rel="stylesheet" href="assets/css/hamburger.css">
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
	<header class="header">
		Shopping List
		<button class="hamburger hamburger--spin" type="button">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</button>
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
				$count = 1;
				$result = $conn->query('select * from list;')->fetch_all(); 
				foreach( $result as $row) {
					?>
					<div class="shopping-list__listing">
						<p class="shopping-list__paragraph">
							<?php
								echo $count++.'.';
								echo $row[1];
							?>
						</p>
						<button type="submit" name="delete-listing-button" value="<?php echo $row[0];?>">
							<span class="delete-listing-button__minus"></span>
						</button>
					</div>
					<?php
				}
			?>
		</form>
	</content>
	<script src="assets/js/main.js"></script>
</body>
</html>