<?php 
class controller{
	public function model($model){
		require_once "./mvc/models/".$model.".php";
		return new $model;
	}
	public function views($views,$data=[]){
		require_once "./mvc/views/".$views.".php";
		
	}
}
 ?>
