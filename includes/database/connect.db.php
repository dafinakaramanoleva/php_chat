<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_password = "";

	$db_name = "chat_app";

	if ($connection = mysql_connect($db_host, $db_user, $db_password)) {
		// echo "Connected to the Database Server...<br />";
		if ($database = mysql_select_db($db_name, $connection)) {
			// echo "Database has been selected... <br />";
		} else {
			echo "Database was not found";
		}
	} else {
		echo "Unable to connect to MySQL server.<br />";
	}

?>