<?php
	$username = $_POST['username'];
	$msg = $_POST['msg'];
	$room = $_POST['room'];

	$data = array(
		'username' => $username,
		'msg' => $msg
	);

	require('../includes/database/connect.db.php');
	$message = mysql_query("INSERT INTO `messages`(`username`, `room`, `message`)
							 VALUES ('$username','$room','$msg')");

	echo json_encode($data);
?>