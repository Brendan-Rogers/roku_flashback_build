<?php
	require_once('admin/scripts/config.php');

	if(isset($_GET['filter'])){
		$tbl = "tbl_movies";
		$tbl2 = "tbl_genre";
		$tbl3 = "tbl_mov_genre";
		$col = "movies_id";
		$col2 = "genre_id";
		$col3 = "genre_name";
		$filter = $_GET['filter'];
		$getMovies = filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter);
	}else{
		$tbl = "tbl_movies";
		$getMovies = getAll($tbl);
	}
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Welcome to the Finest Selection of Blu-rays on the internets!</title>
</head>

<body>
	<?php include('templates/nav.html');?>

	<?php if(!is_string($getMovies)):?>
		<?php while ($row = $getMovies->fetch(PDO::FETCH_ASSOC)):?>
			<img src="images/<?php echo $row['movies_cover'];?>" alt="<?php echo $row['movies_title'];?>">
			<h2>
				<?php echo $row['movies_title'];?>
			</h2>
			<p>
				<?php echo $row['movies_year'];?>
			</p>
			<a href="details.php?id=<?php echo $row['movies_id'];?>">More Details...</a><br><br>
		<?php endwhile;?>
	<?php else:?>
		<p class="error">
			<?php echo $getMovies;?>
		</p>
	<?php endif;?>

	<?php include('templates/footer.html');?>
</body>

</html>