
 <!DOCTYPE html>
 <html>
 <head>
 	<title>cookie</title>
 </head>
 <body>
 	<form action="cookie.php" method="post">
 		<label>name:</label>
 		<input type="text" name="name">
 		<label>password</label>
 		<input type="password" name="password">
 		<input type="submit" name="submit" value="submit">
 	</form>
 	<?php 
 		if (isset($_POST['submit'])) {
 			setcookie('name',$_POST['name'],time()+60);
 			setcookie('password',$_POST['password'],time()+60);
 			header("location:showcookie.php");
 		}
 	 ?>
 <a href="showcookie.php">showcookie</a>
 </body>
 </html>