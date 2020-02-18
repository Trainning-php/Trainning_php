<?php 
	$User=$data['USID']
 ?>
 	<form action="" method="POST" accept-charset="utf-8">
 		<label>UserName</label>
 		<input type="text" name="username" id="username" value="<?php echo $User['username'] ?>">
 		<label>Password</label>
 		<input type="password" name="password"  id="username" value="<?php echo $User['password'] ?>" >
 		<input type="submit" name="submit" value="SUBMIT">
	 	</form>
 