<?php 
	session_start();
	if (isset($_SESSION['name'])&&isset($_SESSION['password'])) {
		echo ("Ten truy cap :".$_SESSION['name']);
		echo "password:".$_SESSION['password'];
	}else{
		echo "Session khong ton tai!";
	}

 ?>