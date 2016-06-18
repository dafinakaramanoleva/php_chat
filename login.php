<?php
	session_start();
	$username = $_POST['login_username'];
	$password = md5($_POST['login_pass']);

	require('includes/database/connect.db.php');
	$result = mysql_query("SELECT * FROM users WHERE username = '$username' AND password='$password'");
	if(mysql_num_rows($result)) {
		$res = mysql_fetch_array($result);

		header('Location: chat_rooms.php');
		$_SESSION['username'] = $res['username'];
	} else {
		echo "<h1>No user found</h1>";
	}
?>