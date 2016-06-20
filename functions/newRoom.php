<?php
	$name = $_POST['new_room'];
	echo '<h1>' .$name. '</h1>';
	require('../includes/database/connect.db.php');

	$checkexist = mysql_query("SELECT name FROM chat_rooms WHERE name='$name'");
	if(mysql_num_rows($checkexist)) {
		echo "<h1>Chat room already exists</h1>";
	} else {
		$result = mysql_query("INSERT INTO chat_rooms(`name`) VALUES ('$name')");
		header('Location: chat_rooms.php');
	}
?>
