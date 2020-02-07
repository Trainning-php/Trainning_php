<?php 
require_once 'config/controller.php';
class homecontroller extends controller 
{   
    public $action;
	public $modelUser;
	function __construct(){
		 $this->modelUser=$this->model("User");

	}
    public function index() {
        echo "Trangchu";
    }
    public function DanhsachUser(){
    	$this->views("Trangchu",[
            "pages"=>"DanhSachUser",
            "US"=>$this->modelUser->getUser('user')
        ]);
    }
    public function edit(){
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
        }
        if (isset($_POST["submit"])) {
            $username=$_POST['username'];
            $password=$_POST['password'];

            $data=[
                "username"=>$username,
                "password"=>$password,
            ];
        $update=$this->modelUser->UpdateUser('user',$data, array('id' => $id));
        var_dump($update);
        die;
         }
        $this->views("Trangchu",[
            "pages"=>"edit",
            "USID"=>$this->modelUser->getUserID('user',$id)
        ]);

    }
    public function delete(){
        $id=$_GET['id'];
        $this->views("Trangchu",[
            "pages"=>"delete",
            "dl"=>$this->modeUser->DeleteUser('user',$id)
        ]);
    }
    public function login(){
          $data=$this->modelUser->getUser('user');
        if (isset($_POST['login'])) {
            $username=isset($_POST['username'])? $_POST['username']:'';
            $password=isset($_POST['username'])? $_POST['password']:'';
        foreach ($data as $key ) {
            if ($key['username']===$username && $key['password']===$password)
             {
               echo "thanh cong";
             }
             else{
                $this->views("Trangchu",[
                    "pages"=>"login"
                ]);
             }
            }
        }
       

       
    }
}

 ?>