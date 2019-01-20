<?php
	require_once('admin/scripts/config.php');
	if(isset($_GET['id'])) {
		//get the movie
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = $_GET['id'];
		$getMovie = getSingle($tbl, $col, $id);
	}
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Details</title>
</head>

<body>
	<?php if(!is_string($getMovie)):?>
		<?php while ($row = $getMovie->fetch(PDO::FETCH_ASSOC)):?>
			<img src="images/<?php echo $row['movies_cover'];?>" alt="<?php echo $row['movies_title'];?>">
			<h2>
				<?php echo $row['movies_title'];?>
			</h2>
			<p>
				<?php echo $row['movies_year'];?>
			</p>
			<p>
				<?php echo $row['movies_storyline'];?>
			</p>
			<a href="index.php">Back...</a>
		<?php endwhile;?>
	<?php else:?>
		<p class="error">
			<?php echo $getMovie;?>
		</p>
	<?php endif;?>
</body>

</html>