<?php 
	require_once 'config/Db.php';
	class User extends Db
	{
		public function getUser($table){
		return	$this->fetchAll($table);
		}
	}
 ?>