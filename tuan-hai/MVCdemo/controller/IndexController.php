<?php 
/**
 * 
 */
require_once 'config/controller.php';
class IndexController extends controller
{
	private $modelUser;
	function __construct()
	{
		$this->modelUser = $this->model('User');
	}
	public function showdataUser(){

		$resultUser  = $this->modelUser->getlistUser();
		$resultBooks = $this->modelUser->getlistBook();
		var_dump($resultBooks);
		$this->views("user",[
            "page"   => "listUser",
            "selectUser"  => $resultUser,
            "selectBooks" => $resultBooks,
		]);
	}
	public function wordCkediter(){
		$this->views("user",[
             "page"  => "wordCkeditor",
		]);
	}
}
?>