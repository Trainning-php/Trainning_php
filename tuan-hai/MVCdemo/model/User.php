<?php 
	require_once 'config/Db.php';
	class User extends Db
	{
		public function getUser($table){
			return	$this->fetchAll($table);
		}
		// lay ra cac ban ghi theo id
		public function getUserID($table,$id){
			return $this->fetchID($table, $id);
		}
		public function UpdateUser($table, $data, $id){
			return $this->update($table, $data, $id);
		}
		public function DeleteUser($table,$id){
			return $this->delete($table,$id);
		}
	}
 ?>