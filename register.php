<?php
	session_start();
	$name = $_POST['name'];
	$username = $_POST['reg_username'];
	$password = md5($_POST['reg_pass']);

	require('includes/database/connect.db.php');

	$checkexist = mysql_query("SELECT username FROM users WHERE username='$username'");
	if(mysql_num_rows($checkexist)) {
		echo "<h1>Username already exists</h1>";
	} else {
		$result = mysql_query("INSERT INTO users(`name`, `username`, `password`, `status`) VALUES 
			('$name', '$username', '$password','0')");
		$_SESSION['username'] = $username;
		header('Location: chat_rooms.php');
	}
?>