<?php
	require('../includes/database/connect.db.php');

	//NOT this way!!!!
	//add links when file!!!!
	$current_user = "adi";
	$room = "All Users";

	if(isset($_FILES['myfile']) && $_FILES['myfile']['size'] > 0) {
		$fileName = $_FILES['myfile']['name'];
		$tmpName  = $_FILES['myfile']['tmp_name'];
		$fileSize = $_FILES['myfile']['size'];
		$fileType = $_FILES['myfile']['type'];

		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);
		if(!get_magic_quotes_gpc())
		{
		    $fileName = addslashes($fileName);
		}

		$query = "INSERT INTO `messages` (`username`, `room`, `message`, `size`, `type`, `content` ) VALUES ('$current_user', '$room', '$fileName', '$fileSize', '$fileType', '$content')";
		mysql_query($query); 

		$id = "";
		$time="";

		$query_id = "SELECT `id`, `time` from `messages` WHERE `message` = '$fileName' AND `size` = '$fileSize';";
		$id_result = mysql_query($query_id);
		while ($id_final = mysql_fetch_assoc($id_result)) {
			$id = $id_final['id'];
			$time = $id_final['time'];
		}


		echo "<div class='row msg'>
				<div class='col-md-2 username'>" .$current_user.  ": </div>
				<div class='col-md-7 msg-text'><a href='download.php?id=".$id."'>". $fileName ."</a></div>
				<div class='col-md-3 time'>" .$time.  "</div>
			</div>";
			

	} else {
		echo "<div class='row msg'>
				<div class='col-md-12'>File was not send correctly.</div>
			</div>";
	}
?>