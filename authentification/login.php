<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
session_start();

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$_SESSION['username'] = $username;
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	
	if (mysqli_num_rows($result) == 1) {
		$user = mysqli_fetch_assoc($result);
		// vérifier si l'utilisateur est un administrateur ou un utilisateur
		if ($user['type'] == 'admin') {
			header('location: admin/home.php');		  
		}else{
			header('location: index.php');
		}
	}else{
		$message = "Username or Password is incorrect!";
	}
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Login</h1>
<input type="text" class="box-input" name="username" placeholder="Username">
<input type="password" class="box-input" name="password" placeholder="Password">
<input type="submit" value="Login " name="submit" class="box-button">
<p class="box-register">Not yet a member? <a href="register.php">Signup now</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>