<!DOCTYPE html>
<html>
<head>
	<title>Post</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<div class="container">
			<form method="Post" action="post.php">
			  <div class="form-group">
			    <label for="exampleInputName">Name address</label>
			    <input  class="form-control" id="name"  placeholder="Enter name" name="name">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="Password1" name="password" placeholder="Password">
			  </div>
			  <div class="form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1">Check me out</label>
			  </div>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<?php 
				if ($_POST["name"] || $_POST["password"]) {
					if (preg_match("/[^A-Za-z'-]/",$_POST['name'])) {
						die("name phai la chu cai");

					}
					echo "chao mung ban :".$_POST['name'];
					exit();
				}
			 ?>
		</div>
	</div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</html>