<?php 
class Home extends controller{
	//$this chính là trỏ đến controller 
 	function Show(){
		 $models=$this->model("SVmodel");
			$this->views("Trangchu",[
				"pages"=>"contuct"
		]);
	}

	function Login(){
		$LoginModel=$this->model("Login");
		$this->views("Trangchu",[
			"pages"=>"Login",
		]);

	}

}
 ?>



