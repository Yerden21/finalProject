	<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>


<header>
	<h1>LOL</h1>
	<div class="nav">
		<div class="nav-login">
			<?php
				if(isset($_SESSION['u_id'])){
					echo '<form action= "includes/logout.inc.php" method="POST">
						<button type = "submit" name="submit">Logout</button>
						</form>';
					if ($_SESSION['is_admin'] == 1) {
						echo '<a href="./admin/retrieve.php">Admin Panel</a>';
					}
				}
				else{
					echo '<form action="includes/login.inc.php" method="POST">
						<input type="text" name="uid" placeholder="Username/e-mail">
						<input type="password" name="pwd" placeholder="Password">
						<button type="submit" name="submit">Login</button>
						</form>';
				}
			?>
		</div>
		<a href="./signup.php">Sign up</a>
		<a href="./index.php">Home</a>
		<a href="./items.php">All News</a>
		<a href="./slide.php">Gallery page</a>
	</div>
</header>
</html>
