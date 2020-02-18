<?php 
class controller
{
	public function model($model) {
	  require_once "./model/".$model.".php";
	  return new $model;
	}
	
	public function views( $views , $data = []) {
	  require_once "./views/".$views.".php";
	}
	
}
 ?>