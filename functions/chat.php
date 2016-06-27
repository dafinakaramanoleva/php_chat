<?php
	include '../includes/header.php';
	$current_user = $_SESSION['username'];

	$room = $_GET['name'];

	$users = mysql_query("SELECT username FROM `chat_users_rooms` WHERE `room` = '$room';");
	$query = mysql_query("SELECT username FROM `chat_users_rooms` WHERE `username` = '$current_user' AND `room` = '$room';");

	$message_query = "SELECT * FROM `messages` WHERE `room` = '$room' ORDER BY `time` DESC;";
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
?>

<div class="container">
	<div class="add-room-content panel panel-success">
		<div class="panel-heading row">
			<div class="chat-name col-md-11"><?php echo $room ?></div>
			<?php
				if ($room != 'All users') {
					if(mysql_num_rows($query)) {
						?>
							<div class="col-md-1">
								<button class="btn btn-success" id="leave-btn" onclick="leaveChat('<?php echo $current_user ?>',
									 event)">Leave</button>
							</div>
						<?php
					} else {
						?>
							<div class="col-md-1">
								<button class="btn btn-success" id="join-btn" onclick="joinChat('<?php echo $current_user ?>',
									 event)">Join
								</button>
							</div>
						<?php
					}
				}
			?>
			
		</div>
		<div class="panel-body">
			<div class="chat">
				<?php
					if ($room != 'All users') {
				?>
					<textarea class="form-control" id="message-text" rows="1" placeholder="Type your message here" disabled></textarea>
					<button class="btn btn-success" id="send-message" disabled onclick="sendMessage('<?php echo $current_user ?>',
						'<?php echo (new DateTime())->format('Y-m-d H:i:s'); ?>', event)">Send
					</button>
					<input type="file" enctype='multipart/form-data' class="right p10" name="file" id="file"
					 	onchange="javascript:fileUpload('<?php echo $current_user ?>');" disabled>
				<?php
					} else {
				?>
					<textarea class="form-control" id="message-text" rows="1" placeholder="Type your message here"></textarea>
					<button class="btn btn-success" id="send-message" onclick="sendMessage('<?php echo $current_user ?>',
						'<?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>', event)">Send
					</button>
					<input type="file" enctype='multipart/form-data' class="right p10" name="file" id="file" 
						onchange="javascript:fileUpload('<?php echo $current_user ?>');">
				<?php
					}
				?>
				
			</div>
			<div class="messages">
				<?php 
					foreach ($msg_array as $msg) {
						$result = "";
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
			</div>
		</div>
		<div class="panel-footer">
			<span>This room's users - </span>
			<?php 
	            while($names = mysql_fetch_array($users)):
	            	echo $names['username']."; ";
	        	endwhile;
	        ?>
		</div>
	</div>
</div>

<?php
	include '../includes/footer.php';
?>

<script type="text/javascript" src="../js/chat.js"></script>