<?php
	$username = $_POST['username'];
	$msg = $_POST['msg'];
	$room = $_POST['room'];
	$time =  date('Y-m-d H:i:s', strtotime('+1 hour'));

	$data = array(
		'username' => $username,
		'currenttime' => $time,
		'msg' => $msg
	);

	require('../includes/database/connect.db.php');
	$message = mysql_query("INSERT INTO `messages`(`username`, `room`, `message`)
							 VALUES ('$username','$room','$msg')");

	echo json_encode($data);
?>