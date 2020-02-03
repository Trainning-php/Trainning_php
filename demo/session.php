<?php 
session_start();
if (isset( $_POST['submit'])) {
	$_SESSION['name']=$_POST['name'];
	$_SESSION['password']=$_POST['password'];
	header("location:showsession.php");
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>session</title>
 </head>
 <body>
 <form method="post" action="session.php">
 	<label>name:</label>
 	<input type="text" name="name">
 	<label>password</label>
 	<input type="password" name="password">
 	<input type="submit" name="submit" value="submit">
 </form>
 </body>
 </html>