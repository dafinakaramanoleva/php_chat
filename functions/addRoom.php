<?php
	include 'header.php';
?>

<div class="container">
	<div class="add-room-content panel panel-success">
		<div class="panel-heading">Add new room</div>
		<div class="panel-body">
				<form action="newRoom.php" method="post">
					<div class="form-group">
						<label for="new_room">Room name:</label>
			  			<input type="text" class="form-control" id="new_room" name="new_room">
					</div>
					<button type="submit" class="btn btn-success" id="new_room_button">Create the room</button>
				</form>
		</div>
	</div>
</div>
<?php
	include 'footer.php';
?>