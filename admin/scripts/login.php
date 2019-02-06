<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');
		// count all rows with matching USERNAME and PASSWORD
		$check_exist_query = "SELECT COUNT(*) FROM tbl_user WHERE user_name=:username AND user_pass=:password";
		$user_set = $pdo->prepare($check_exist_query);
		$user_set->execute(
			array(
				':username'=>$username,
				':password'=>$password,
			)
		);

		// if there's more the 0 matches (the USER exists)
		if($user_set->fetchColumn() > 0){
			// query for the user (not a count)
			$get_user_query = 'SELECT * FROM tbl_user WHERE user_name=:username AND user_pass=:password';
			$user_set = $pdo->prepare($get_user_query);
			$user_set->execute(
				array(
					':username'=>$username,
					':password'=>$password,
				)
			);
			while($founduser = $user_set->fetch(PDO::FETCH_ASSOC)){
				// founduser is each matching user in the tbl_user
				$id = $founduser['user_id'];
				// set temporary session globalvariables, using the found user
				$_SESSION['user_id'] = $id;
				$_SESSION['user_name']= $founduser['user_fname'];
				if (empty($id)) {
					echo 'login failed...';
				}

				$update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
				$updatequery = $pdo->query($update);
			}
			
			redirect_to("admin_index.php");
		}else{
			$message = "Learn how to type you dumba&*.";
			return $message;
		}
	}
?>