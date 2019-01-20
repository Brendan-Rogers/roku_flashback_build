<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	require_once('scripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Welcome to your admin panel</title>
</head>

<body>
	<h2>
		<?php echo $_SESSION['user_name'];?>
	</h2>
	<a href="admin_createuser.php">Create User</a>
	<a href="admin_edituser.php">Edit User</a>
	<a href="admin_deleteuser.php">Delete User</a>
	<a href="scripts/caller.php?caller_id=logout">Sign Out</a>
</body>

</html>