<?php
	session_start();
	$user_id = $_POST['user_id'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	if(empty($username) || empty($phone) || empty($email)){
	   $_SESSION['message']="All fields are required";
	   header('Location: ../edit_user.php?user_id='.$user_id);
		exit();
	}

	$conn = mysqli_connect('localhost', 'root', '', 'foodi');

	$update_user = mysqli_query(
		$conn,
		"UPDATE user_crud_ops SET username = '$username', email = '$email', phone = '$phone' WHERE user_id = '$user_id'"
	);

	if($update_user) {
		$_SESSION['message'] = "Updated successfully";
		header('Location: ../edit_user.php?user_id='.$user_id);
	} else {
		$_SESSION['message'] = "Failed to update user";
		header('Location: ../edit_user.php?user_id='.$user_id);
	}


