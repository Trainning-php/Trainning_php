<?php 
class Home extends controller{
	//$this chính là trỏ đến controller 
	public $modelSV;
	public $modelLogin;

	function __construct(){
		$this->modelSV=$this->model("SVmodel");
		$this->modelLogin=$this->model("Login");
	}
 	function Show(){
			$this->views("Trangchu",[
				"pages"=>"trangchu"
		]);
	}
	function contuct(){
		$this->views("Trangchu",[
				"pages"=>"contuct",
				"SV"=>$this->modelSV-> DanhSachSV(),
		]);
		
	}

	function Login(){
		$this->views("Trangchu",[
			"pages"=>"Login",
			"admin"=>$this->modelLogin->SelectAdmin(),
		]);
	}
	function edit(){
		$this->views("Trangchu",[
			"pages"=>"edit",
			"ED"=>$this->modelSV->DanhSachSVID(),
		]);
	}
	function delete(){
		$this->views("Trangchu",[
			"pages"=>"delete",
		]);
	}
}
 ?>



