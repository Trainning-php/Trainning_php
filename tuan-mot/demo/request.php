<!DOCTYPE html>
<html>
<head>
	<title>request</title>
</head>
<body>
	<form action="request.php" method="Post">
		<label>Name:</label>
		<input type="text" name="name" id="name">
		<label>Age:</label>
		<input type="text" name="age" id="age">
		<button type="submit">Submit</button>
	</form>
	<?php 
	if ($_REQUEST["name"]||$_REQUEST["age"]) {
		echo "chao ban:".$_REQUEST['name']."</br>";
		echo "ban da:".$_REQUEST['age'];
	}
	 ?>
</body>
</html>