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
	public function showDataUserAction(){

		$resultUser  = $this->modelUser->getlistUser();
		$resultBooks = $this->modelUser->getlistBook();
		var_dump($resultBooks);
		$this->views("user",[
            "page"        => "listUser",
            "selectUser"  => $resultUser,
            "selectBooks" => $resultBooks,
		]);
	}

	public function wordCkediterAction(){
		$this->views("user",[
             "page"  => "wordCkeditor",
		]);
	}
	public function wordWithJsonpAction(){
		$this->views("user",[
		    "page"  => "JsonpTemplate",
		]);
	}
}
?>