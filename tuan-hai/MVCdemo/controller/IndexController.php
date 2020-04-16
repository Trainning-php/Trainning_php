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
		$this->modelUser = $this->models('biz','User');
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
	 	$data = ['mai','mai','mai',52];
		$updata      = $this->modelUser->updateData('books',$data);
       
		$this->view("pages/template","user",[
            "page"        => "listUser",
            "selectUser"  => $resultUser,
            "selectBooks" => $resultBooks,
		]);
	}
    
	public function wordCkediterAction(){
		$data  = [];
		if ( isset( $_POST['submit'] )) {
			$name     = $_POST['name'];
			$title    = $_POST['title'];
			$ckediter = $_POST['ckediter'];
			$data     = [$name,$title,$ckediter];
		   	
		} 
		if (  $data !== []  ) {

		    $this->view("pages/template","user",[
                        "page"    => "wordCkeditor",
		    ]);
		}else{
			$this->modelUser
			     ->insertData($data);
		}
		    $this->view("pages/template","user",[
                "page"    => "wordCkeditor",
		]);
	}

	public function wordWithJsonpAction(){
		$this->view("pages/template","user",[
		    "page"  => "JsonpTemplate",
		]);
	}
	
	public function showData(){
		$this->view("pages/trangchu","dulieu",[
            "datas"    => $this->modelUser->getlistUser()   
        ]);
	}
	public function insertDataAction(){
		$arrData = [];
		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			if ($_POST['password'] == null ) {
			    $password = $_POST['password'];
			}else{
				$password=md5($_POST['password']);
			}
			$address  = $_POST['address'];
			$email    = $_POST['email'];
			$arrData  = [ $username , $password , $address , $email];
		}

		if (  $arrData !== []  ) {
			  $this->view("","Trangchu",[
                            "pages" =>"insertData",
           ]);
		}else
		{
            $this->modelUser->isertUsers($arrData);
		}
        $this->view("","Trangchu",[
            "pages" =>"insertData",
        ]);
	}
	
}
?>