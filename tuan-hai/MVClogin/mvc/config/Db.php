<?php 
	class Db {
		public $con;
		public $servername='localhost';
		public $username='tue';
		public $password='root';
 		public $DbName='mvc';
		function __contruct(){
			$this->con = mysqli_connect($this->servername,$this->username,$this->password);
			mysqli_select_db($this->con,$this->DbName);
			mysqli_query($this->con,"SET NAMES 'utf8'");
		}
	}
 ?>