<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');
		$check_exist_query = "SELECT COUNT(*) FROM tbl_user WHERE user_name=:username AND user_pass=:password";
		$user_set = $pdo->prepare($check_exist_query);
		$user_set->execute(
			array(
				':username'=>$username,
				':password'=>$password,
			)
		);
		if($user_set->fetchColumn() > 0){
			$get_user_query = 'SELECT * FROM tbl_user WHERE user_name=:username AND user_pass=:password';
			$user_set = $pdo->prepare($get_user_query);
			$user_set->execute(
				array(
					':username'=>$username,
					':password'=>$password,
				)
			);
			while($founduser = $user_set->fetch(PDO::FETCH_ASSOC)){
				$id = $founduser['user_id'];
				$_SESSION['user_id'] = $id;
				$_SESSION['user_name']= $founduser['user_fname'];

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