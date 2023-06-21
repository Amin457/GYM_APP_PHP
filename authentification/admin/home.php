<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: ../login.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="../style.css" />
	</head>
	<body>
		<div class="sucess">
		<h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>
		<p>This is your Admin Dashboard.</p>
		<a href="add_user.php">Add user</a> | 
		<a href="update_user.php">Update user</a> | 
		<a href="remove_user.php">Delete user</a> | 
		<a href="../logout.php">Logout</a>
		</ul>
		</div>
	</body>
</html>