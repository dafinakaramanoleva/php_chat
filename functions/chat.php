<?php
	include '../includes/header.php';
	$current_user = $_SESSION['username'];

	$room = $_GET['name'];

	$users = mysql_query("SELECT username FROM `chat_users_rooms` WHERE `room` = '$room';");
	$query = mysql_query("SELECT username FROM `chat_users_rooms` WHERE `username` = '$current_user' AND `room` = '$room';");
	
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
						'<?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>', event)">Send
					</button>
				<?php
					} else {
				?>
					<textarea class="form-control" id="message-text" rows="1" placeholder="Type your message here"></textarea>
					<button class="btn btn-success" id="send-message" onclick="sendMessage('<?php echo $current_user ?>',
						'<?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>', event)">Send
					</button>

				<?php
					}
				?>
				
			</div>
			<div class="messages"></div>
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