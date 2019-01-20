<?php

function addMovie($cover, $title, $year, $run, $story, $trailer, $release, $genre)
{
	include 'connect.php';
	$file_type = pathinfo($cover['name'], PATHINFO_EXTENSION);
	$accepted_types = array('gif','jpg','jpe','jpeg','png');
    if (!in_array($file_type, $accepted_types)) {
        $error = "Wrong file type!";
        return $error;
    }

	$targetpath = '../images/'.$cover['name'];

    if (!move_uploaded_file($cover['tmp_name'], $targetpath)) {
		$error = "Failed to move uploaded file, check permission";
        return $error;
	}
        
	$th_copy = "../images/TH_{$cover['name']}";
	if (!copy($targetpath, $th_copy)) {
		$error = "Whoops, that didn't work.";
		return $error;
	}

	//Add to database
	$insert_movie_query = 'INSERT INTO tbl_movies(movies_cover,movies_title,movies_year,movies_runtime,movies_storyline,movies_trailer,movies_release) VALUES(:movies_cover,:movies_title,:movies_year,:movies_runtime,:movies_storyline,:movies_trailer,:movies_release)';
	$insert_movie  = $pdo->prepare($insert_movie_query);
	$insert_movie->execute(
		array(
			':movies_cover'     => $cover['name'],
			':movies_title'     => $title,
			':movies_year'      => $year,
			':movies_runtime'   => $run,
			':movies_storyline' => $story,
			':movies_trailer'   => $trailer,
			':movies_release'   => $release,
		)
	);

	$lastId = $pdo->lastInsertId();

	$update_genre_query = 'INSERT INTO tbl_mov_genre(movies_id, genre_id) VALUES(:movies_id, :genre_id)';

	
	$update_genre  = $pdo->prepare($update_genre_query);

	$update_genre->execute(
		array(
			':movies_id'=>$lastId,
			':genre_id'=>$genre
		)
	);

	redirect_to("admin_index.php");
    
}