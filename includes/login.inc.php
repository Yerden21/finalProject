<?php

session_start();

if(isset($_POST['submit'])){

	include 'dbh.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check if input are emty

	if(empty($uid)|| empty($pwd)){
		header("Location: ../index.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			header("Location: ../index.php?login=checkerror");
		exit();
		}
		
		else{
			if($row = mysqli_fetch_assoc($result)){
				//De-hashing the password
				$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
				if($row['user_pwd'] == $hashedPwd){
					header("Location: ../index.php?login=hasherror");
					exit();
				}else{
					//Log in the user here
					$_SESSION['u_id']  = $row['user_id'];
					$_SESSION['u_first']  = $row['user_first'];
					$_SESSION['u_last']  = $row['user_last'];
					$_SESSION['u_email']  = $row['user_email'];
					$_SESSION['u_login']  = $row['user_uid'];
					$_SESSION['is_admin'] = $row['user_admin'];
					header("Location: ../index.php?login=".$row['user_id']);
					exit();
				}

			}
		}
	}

}else{
	header("Location: ../index.php?login=submiterror");
	exit();
}



?>