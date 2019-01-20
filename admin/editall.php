<?php
	require_once('scripts/config.php');
	
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>The one ring to control all rings...</title>
</head>

<body>
	<?php
		$tbl = "tbl_cast";
		$col = "cast_id";
		$id = 1;
		echo single_edit($tbl, $col, $id);
	?>
</body>

</html>