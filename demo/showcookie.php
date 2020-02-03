<?php 
	if (isset($_COOKIE['name'])&&isset($_COOKIE['password'])) {
		echo "ten :".$_COOKIE['name']."</br>";
		echo "password".$_COOKIE['password'];

	}else{
		echo "cookie khong ton tai"."</br>";
	}
 ?>
 <a href="cookie.php">quaylai</a>
