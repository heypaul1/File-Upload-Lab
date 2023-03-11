<!DOCTYPE html>
<html>
<body>
	<h4>File Upload Vulnerability - Content Type Check for PNG, JPG, JPEG & GIF</h4>
	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
		if($_FILES["file"]["error"])
		{
			echo "Error: ".$_FILES["file"]["error"];
			die();
		}

		$valid_content_type = array("image/gif", "image/jpeg", "image/jpg", "image/png");

		if(in_array($_FILES["file"]["type"], $valid_content_type))
		{
			echo "Name: ".$_FILES["file"]["name"];
			echo "<br>Size: ".$_FILES["file"]["size"];
			echo "<br>Temp File: ".$_FILES["file"]["tmp_name"];
			echo "<br>Type: ".$_FILES["file"]["type"];

			move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/".$_FILES["file"]["name"]);
		}
		else {
			echo "Please upload only image file. Valid Extension: png, jpg, jpeg, gif";
			echo "<br>Type: ".$_FILES["file"]["type"];	
		}
	}

	?>
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="file"><br>
		<input type="submit" name="submit" value="Upload">
	</form>
</body>
</html>
