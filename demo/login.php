	<?php 
	$servername = "localhost";
	$username = "tue";
	$password = "root";
	$dbname = "Demo";
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	if ($conn->connect_error) {
	 		die("connection failed:".$conn->connect_error);
	 	} 	
	 	$sql = "SELECT * FROM admin";
	 	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " ."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
	 	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>login useing session cookie</title>
</head>
<body>

	<form action="login.php">
		<label>username</label>
		<input type="text" name="username" value="username">
		<label>password</label>
		<input type="password" name="password" value="password">
		<input type="submit" name="submit"  value="login">
	</form>
</body>
</html>