<?php
	require('../includes/database/connect.db.php');
	$date = (new \DateTime())->format('Y-m-d H:i:s');
	
	function get_msg() {
		$room = $_GET['room'];
		$message_query = "SELECT * FROM `messages` WHERE `room` = '$room' ORDER BY `time` DESC;";
		$messagesResult = mysql_query($message_query);

		$msg_array = array();
		while($message = mysql_fetch_assoc($messagesResult)) {
			$msg_array[] = array('username' => $message['username'],
									'message' => $message['message'],
									'time' => $message['time']);
		}

		return $msg_array;
	}


	$messages = get_msg();
	foreach ($messages as $msg) {
		echo "<div class='row msg'>
			<div class='col-md-2 username'>" .$msg['username'].  ": </div>
			<div class='col-md-7 msg-text'>" .$msg['message'].  "</div>
			<div class='col-md-3 time'>" .$msg['time'].  "</div>
		</div>";
	}
	

	

	
?>