<?php
	require_once('scripts/config.php');
	//confirm_logged_in();
	$tbl = "tbl_user";
	$users = getAll($tbl);
?>
<!doctype html>
<html>
<title>Delete User</title>

<head>
	<meta charset="UTF-8">
	<title>Delete User</title>
</head>

<body>
	<h2>Time to destroy some lives...</h2>
	<?php while($row = $users->fetch(PDO::FETCH_ASSOC)):?>
	<?php echo $row['user_fname'];?> <a href="scripts/caller.php?caller_id=delete&id=<?php echo $row['user_id'];?>">Fired</a><br>
	<?php endwhile;	?>
</body>

</html>