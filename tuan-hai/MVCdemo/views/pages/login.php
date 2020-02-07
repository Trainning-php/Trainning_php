<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<form action="index.php?controller=home&action=login" method="POST" accept-charset="utf-8">
		<label>Username:</label>
		<input type="text" name="username" id="username">
		<label>Password</label>
		<input type="password" name="password" id="password">
		<input type="submit" name="login" id="login" value="Login">
	</form>
</body>