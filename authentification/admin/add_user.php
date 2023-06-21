<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
<?php
require('../config.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['type'], $_REQUEST['password'])){

	$username = ($_REQUEST['username']);
	$email = ($_REQUEST['email']);
	$password = ($_REQUEST['password']);
	$type = ($_REQUEST['type']);
	
    $query = "INSERT into `users` (username, email, type, password)
				  VALUES ('$username', '$email', '$type', '".hash('sha256', $password)."')";
    $res = mysqli_query($conn, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>The user has been created successfully.</h3>
             <p>Click <a href='home.php'>here</a> to return to home page</p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
    <h1 class="box-title">Add user</h1>
	<input type="text" class="box-input" name="username" placeholder="Username" required>
    <input type="email" class="box-input" name="email" placeholder="Email" required>
	<div class="input-group">
			<select class="box-input" name="type" id="type" >
				<option value="" disabled selected>Type</option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
	</div>
    <input type="password" class="box-input" name="password" placeholder="Password" required>
    <input type="submit" name="submit" value="Add User" class="box-button" />
</form>
<?php } ?>
</body>
</html>