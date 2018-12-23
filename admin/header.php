<?php
	session_start();
	if (isset($_SESSION['is_admin'])) {
		if ($_SESSION['is_admin'] == 0) {
			exit();
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>


<header>
    <h1>LOL</h1>
    <div class="nav-admin">
        <a href="./create.php">Create</a>
		<a href="./retrieve.php">Retrieve</a>
    </div>
	<div class="nav">
		<div class="nav-login">
			<?php
				if(isset($_SESSION['u_id'])){
					echo '<form action= "../includes/logout.inc.php" method="POST">
						<button type = "submit" name="submit">Logout</button>
						</form>';
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
		<a href="../signup.php">Sign up</a>
		<a href="../index.php">Home Page</a>
		<a href="../items.php">All News</a>
		<a href="../slide.php">Gallery page</a>
	</div>
</header>
</html>
<?php } 
	else {
		echo "You are not admin";
		exit();
	}
?>
