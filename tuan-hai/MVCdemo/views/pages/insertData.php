<form action="index.php?&Controller=Index&action=insertDataAction" method="POST" >
	<input type="hidden" name="Controller" value="Index">
	<input type="hidden" name="action" value="insertData">
	<label>Username: </label>
	<input type="text" name="username">
	<br>
	<label>Password: </label>
	<input type="password" name="password">
	<br>
	<label>Address: </label>
	<input type="text" name="address">
	<br>
	<label>Email: </label>
	<input type="email" name="email"><br>
	<input type="submit" name="submit" value="submit">
</form>