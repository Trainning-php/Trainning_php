<?php 
require_once 'config/controller.php';

class homeController extends controller 
{   
    public $modelUser;

        function __construct()
        {
            $this->modelUser = $this->model("User");
        }

        public function index()
        {
            $this->views("Trangchu",[
            "pages" =>"home",
            ]);
        }

        public function listUser()
        {
            $this->views("Trangchu",[
                "pages" => "DanhSachUser",
                "US"    => $this->modelUser->getUser('user')
            ]);
        }
        public function edit()
        {
            if (isset($_GET['id'])) {
                $id  = $_GET['id'];
            }
            if (isset($_POST["submit"])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $data     =[
                    "username" => $username,
                    "password" => $password,
                ];
            $update=$this->modelUser->UpdateUser('user' , $username , $password , $id);
            if (  $update = true ) {
                $this->views("Trangchu",[
                    "pages"    => "DanhSachUser",
                    "US"       => $this->modelUser->getUser('user')
                ]);
            }
            }
            $this->views("Trangchu",[
                "pages"    => "edit",
                "USID"     => $this->modelUser->getUserID('user',$id)
            ]);
        }
        //delete
        public function delete()
        {
            $id=$_GET['id'];
            $this->views("Trangchu",[
                "pages" => "delete",
                "dl"    => $this->modelUser->DeleteUser(' user ', $id)
            ]);
        }
        //login
        public function login()
        {
            $data=$this->modelUser->getUser('user');
            if (isset($_POST['login'])) {
                $username = isset($_POST['username'])? $_POST['username']:'';
                $password = isset($_POST['username'])? $_POST['password']:'';
                foreach ($data as $key ) {
                    if ($key['username'] === $username && $key['password'] === $password)
                    {
                        $this->views("",[]);
                    }else{
                        $this->views("Trangchu",[
                            "pages" => "login"]);
                    }
                }
            }
            $this->views("Trangchu",[
                "pages" => "login"]);
        }
}

 ?>