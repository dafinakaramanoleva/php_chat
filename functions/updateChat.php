<?php
	require('../includes/database/connect.db.php');

	function get_msg() {
		$room = $_GET['room'];
		$time = $_GET['time'];

		$timestamp = strtotime($time);
		$current_time = date("Y-m-d H:i:s", $timestamp);
 
		$message_query = "SELECT * FROM `messages` WHERE `room` = '$room' AND `time` > '$current_time' ORDER BY `time` DESC;";
		$messagesResult = mysql_query($message_query);

		$msg_array = array();
		$index = 0;
		while($message = mysql_fetch_assoc($messagesResult)) {
			$msg_array[$index] = array('message_id' => $message['id'],
								 'username' => $message['username'],
								 'message' => $message['message'],
								 'time' => $message['time'],
								 'size' => null);
			if($message['size'] != null) {
				$msg_array[$index]['size'] = $message['size'];
			}
		$index++;
		}

		return $msg_array;
	}


	$messages = get_msg();
	foreach ($messages as $msg) {
		$result = "<div class='row msg'>
			<div class='col-md-2 username'>" .$msg['username'].  ": </div>
			<div class='col-md-7 msg-text'>";
		if ($msg['size'] != null) {
			$result = $result."<a href='download.php?id=".$msg['message_id']."'>". $msg['message'] ."</a>";
		} else {
			$result = $result.$msg['message'];
		}
		   
		$result = $result."</div>
			<div class='col-md-3 time'>" .$msg['time'].  "</div>
		</div>";

		echo $result;
	}
	

	

	
?>