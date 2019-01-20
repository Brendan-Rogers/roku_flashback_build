<?php
	require_once('scripts/config.php');
	$result = multiReturns(17);
	list($add, $multiply) = multiReturns(24567);
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Welcome to your admin panel login</title>
</head>

<body>
	<?php
		echo "Result 1: {$result[0]}<br>";
		echo "Result 2: {$result[1]}<br><br>";
		echo "Result 1 from list: {$add}<br>";
		echo "Result 2 from list: {$multiply}<br><br>";
	?>
</body>

</html>