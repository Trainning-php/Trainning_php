<?php 
require_once 'config/controller.php';
class home extends controller 
{
	public $modePost;
	public $modelUser;
	function __construct(){
		// $this->modePost=$this->model();
		 $this->modeUser=$this->model("User");
	}
    public function index() {
        echo "Trangchu";
    }
    public function Formlogin(){
    	$this->views("Trangchu",[
            "pages"=>"Formlogin",
            "US"=>$this->modeUser->getUser('user')
        ]);
    }
}
 ?>