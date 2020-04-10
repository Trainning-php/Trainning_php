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
	// public function randomToken($numberkey){
	// 	$array  = array('a','b','c','d','e','f',0,1,2,3,4,5,6,7,8,9);
	// 	$result ='';
	// 	for ($i=0; $i <$numberkey ; $i++) { 
	// 		$result =  $result .$array[rand(0,count($array)-1)];
	// 	}
	// 	return $result;
	// }

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
		$data  = [];
		if ( isset( $_POST['submit'] )) {
			$name     = '';
			$title    = 'anh';
			$ckediter = $_POST['ckediter'];
			$data     = [$name,$title,$ckediter];
			$this->modelUser->insertData($data);
		} 
		$this->views("user",[
             "page"    => "wordCkeditor",
		]);
	}

	public function wordWithJsonpAction(){
		$this->views("user",[
		    "page"  => "JsonpTemplate",
		]);
	}
	
	public function showData(){
		 $this->view("trangchu","dulieu",[
            "datas"    => $this->modelUser->getlistUser()   
        ]);
	}
	
}
?>