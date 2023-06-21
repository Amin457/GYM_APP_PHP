<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
<?php
require('../config.php');

if (isset($_REQUEST['username'])){

	$username = ($_REQUEST['username']);
    $query = "DELETE FROM users WHERE username='$username'" ;
    $res = mysqli_query($conn, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>The user has been removed successfully.</h3>
             <p>Click <a href='home.php'>here</a> to return to home page</p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
    <h1 class="box-title">Remove user</h1>
	<input type="text" class="box-input" name="username" placeholder="Username" required>
    <input type="submit" name="submit" value="Remove User" class="box-button" />
</form>
<?php } ?>
</body>
</html>