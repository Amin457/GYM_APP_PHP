<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){

	$username = ($_REQUEST['username']);
	$email = ($_REQUEST['email']);
	$password = ($_REQUEST['password']);
	
	$query = "INSERT into `users` (username, email, type, password)
				VALUES ('$username', '$email', 'user', '".hash('sha256', $password)."')";
	$res = mysqli_query($conn, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>You have successfully registered.</h3>
             <p>Click here to <a href='login.php'>Login</a></p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
    <h1 class="box-title">Sign-up</h1>
	<input type="text" class="box-input" name="username" placeholder="Username" required>
    <input type="email" class="box-input" name="email" placeholder="Email" required>
    <input type="password" class="box-input" name="password" placeholder="Password" required>
    <input type="submit" name="submit" value="Sign-up" class="box-button" />
    <p class="box-register">Already a member? <a href="login.php">Login here</a></p>
</form>
<?php } ?>
</body>
</html>