<?php
	
	$username = $_POST['username'];
	$room = $_POST['room'];

	$data = array(
		'username' => $username,
		'room' => $room
	);
	
	require('../includes/database/connect.db.php');
	$join = mysql_query("INSERT INTO `chat_users_rooms`(`username`, `room`) VALUES ('$username', '$room')");

	echo json_encode($data);
?>