<?php

	function createUser($fname, $username, $password, $email, $lvllist) {
		include('connect.php');
		$userstring = "INSERT INTO tbl_user(user_fname,user_name,user_pass,user_email,user_date,user_ip) VALUES('{$fname}', '{$username}', '{$password}', '{$email}', NULL, 'no' )";
		$userquery = $pdo->query($userstring);
		if($userquery) {
			redirect_to('admin_index.php');
		}else{
			$message = "Your hiring practices have failed you.  This individual sucks.";
			return $message;
		}
	}

	function editUser($id, $fname, $username, $password, $email) {
		include('connect.php');
		
		$updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$password}', user_email='{$email}' WHERE user_id={$id}";
		$updatequery = $pdo->query($updatestring);

		if($updatequery) {
			redirect_to("admin_index.php");
		}else{
			$message = "Guess you got canned...";
			return $message;
		}

	}

	function deleteUser($id) {
		include('connect.php');
		$delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";
		$delquery = $pdo->query($delstring);
		if($delquery) {
			redirect_to("../admin_index.php");
		}else{
			$message = "Bye, bye...";
			return $message;
		}
	}
?>