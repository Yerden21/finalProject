<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/slide.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'header.php';?>
    <div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input type="text" name="first" placeholder="Firstname">
			<input type="text" name="last" placeholder="Lastname">
			<input type="text" name="email" placeholder="E-mail">
			<input type="text" name="uid" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">
			<input type="password" name="adminpass" placeholder="Admin password(feel free if not)">
			<button type="submit" name="submit">Sign up</button>
		</form>
	</div>
    <?php include_once 'footer.php'; ?>
</body>
</html>