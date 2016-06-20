<?php
	
	$username = $_POST['username'];
	$room = $_POST['room'];

	$data = array(
		'username' => $username,
		'room' => $room
	);
	
	require('../includes/database/connect.db.php');
	$join = mysql_query("DELETE FROM `chat_users_rooms` WHERE username = '$username' AND room ='$room';");

	echo json_encode($data);
?>