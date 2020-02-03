<?php  ?>
<?php 
		$cookie_name="tencookie";
		$cokie_value="daylabien";
		setcookie($cookie_name,$cokie_value,time()+60,"/");
		session_start();
		// session_register("username");
		// $_SESSION["username"]="maivantue";

		if (!$_SESSION['count']) {
			$_SESSION['count']=1;
		}else{
			$_SESSION['count']++;
		}
	 ?>
	 <?php 
	 echo $_SESSION['count'];
	  ?>

<!DOCTYPE html>
<html>
<head>
	<title>sessioncookie</title>
</head>
<body>
	
<?php 
	if (!$_COOKIE[$cookie_name]) {
		echo "cookie name '".$cookie_name."'is not set";
	}else
	{
		echo "Cookie'".$cookie_name."'is set !</br>";
		echo "Values:".$_COOKIE[$cookie_name];
	}
 ?>
 <div>
 	<?php 
 	if (count($_COOKIE)>0) {
 		echo "cookie is enable";
 	}else{
 		echo "cookie is disabled";
 	}
 	 ?>
 	 <a href="session2.php">click</a>
 </div>
 <div>
 	<a href="request.php"></a>
 </div>
</body>
</html>