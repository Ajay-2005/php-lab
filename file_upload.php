<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>
</head>
<body>
	
	<form action="" method="post" enctype="multipart/form-data">
		Select a file:
		<input type="file" name="image" required /><br>
		<input type="submit" value="Submit" />
	</form>
</body>
</html>

<?php
if (isset($_FILES["image"])) {
	$file_name = $_FILES["image"]["name"];
	$file_size = $_FILES["image"]["size"];
	$file_type = $_FILES["image"]["type"];
	echo "File uploaded successfully:<br>";
	echo "File Name: " . htmlspecialchars($file_name) . "<br>";
	echo "File Size: " . $file_size . " bytes<br>";
	echo "File Type: " . htmlspecialchars($file_type) . "<br>";
} else {
	echo "No file uploaded.";
}
?>

