<?php
	include '../includes/header.php';
    	$getRooms = "SELECT * FROM chat_rooms;";
    	$roomResults = mysql_query($getRooms);	
?>

<div class="container">
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Chat rooms</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
	        <?php 
	            while($rooms = mysql_fetch_array($roomResults)):
	                $room = $rooms['name'];
	                $query = mysql_query("SELECT * FROM `chat_users_rooms` WHERE `room` = '$room';") or die("Cannot find data". mysql_error());
	                $numOfUsers = mysql_num_rows($query);
	        ?>
	        <tr class="row room">
				<td class="col-xs-6">
					<a href="chat.php?name=<?php echo $rooms['name']?>">
	            	<?php echo $rooms['name'] ?>
	            </a>
				</td>
				<td class="numofusers col-xs-6">
					<?php echo "<span>Users chatting: <strong>" . $numOfUsers . "</strong></span>" ?>
				</td>
			</tr>
	            
	        <?php endwhile; ?>
	    </tbody>
	</table>
	<button class="btn btn-success" id="add_room_button">Add room</button>
	
</div>
<?php
	include '../includes/footer.php';
?>