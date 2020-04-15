<?php 
include_once './public/curl1.php';
require_once 'config/controller.php';
require_once 'src/PHPMailer.php';
require_once 'src/Exception.php';
require_once 'src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class PDOhomeController extends controller

{
    private $modelUserPDO;
    private $modelsUserPDO;
    private $getAllUser;
        function __construct()
        {
            $this->modelUserPDO = $this->models('','PDOuser');
            $this->getAllUser   = $this->modelUserPDO->getUser();
        }
       
          // lấy ra danh sách user 
        
        public function selectUser() 
        {
            $this ->views("Trangchu",[
                "pages" => "ListUserPDO",
                "DT"    => $this->getAllUser,
            ]);
        }
         //search 
        function file_permission($filename){
            $perms = fileperms($filename);
 
            if (($perms & 0xC000) == 0xC000) { $info = 's'; }
            elseif (($perms & 0xA000) == 0xA000) { $info = 'l'; }
            elseif (($perms & 0x8000) == 0x8000) { $info = '-'; }
            elseif (($perms & 0x6000) == 0x6000) { $info = 'b'; }
            elseif (($perms & 0x4000) == 0x4000) { $info = 'd'; }
            elseif (($perms & 0x2000) == 0x2000) { $info = 'c'; }
            elseif (($perms & 0x1000) == 0x1000) { $info = 'p'; }
            else { $info = 'u'; }
 
            $info .= (($perms & 0x0100) ? 'r' : '-');
            $info .= (($perms & 0x0080) ? 'w' : '-');
            $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) :
                     (($perms & 0x0800) ? 'S' : '-'));
 
            $info .= (($perms & 0x0020) ? 'r' : '-');
            $info .= (($perms & 0x0010) ? 'w' : '-');
            $info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) :
                     (($perms & 0x0400) ? 'S' : '-'));
 
            $info .= (($perms & 0x0004) ? 'r' : '-');
            $info .= (($perms & 0x0002) ? 'w' : '-');
            $info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) :
                     (($perms & 0x0200) ? 'T' : '-'));
 
            return $info;
        }
        
        public function search()
        {
            if (empty($_GET['search'])) {
                $this->views("Trangchu", [
                    "pages"      => "search",
                    "DATA"       => $this->getAllUser,
                    "total"      => $this->modelUserPDO->TotalP()
                ]);
            }else {
                $keyword = $_GET['search'];
                $this->views("Trangchu", [
                    "pages"      => "search",
                    "DATA"       => $this->modelUserPDO->searchUser($keyword),
                    "total"      => $this->modelUserPDO->TotalP(),
                ]);
            }
        }
        //export file csv
        public function export()
        {
            if (empty($_GET['search'])) {

                $this->views("Trangchu", [
                    "pages"      => "search",
                    "DATA"       => $this->getAllUser,
                    "total"      => $this->modelUserPDO->TotalP(),
                ]);

            }else {

                $keyword = $_GET['search'];
                $data    = $this->modelUserPDO->searchUser($keyword);
                $openfile= fopen("DataSearch.csv","w")or die("Unable to open file!");

                    fputcsv($openfile , array('ID','USERNAME','PASSWORD','ADDRESS'));
                        foreach ($data as $key) {
                            fputcsv($openfile,$key);
                        }
                    fclose($openfile);
                $this->views("Trangchu", [
                    "pages"      => "search",
                    "DATA"       => $data ,
                    "total"      => $this->modelUserPDO->TotalP(),
                ]);
            }
        }
        // phân trang 
        public function inportCSV()
        {
            $this->views("Trangchu",[
                "pages"   =>"inportCSV",
            ]);
            if (isset($_POST['submit'])) {
       	        if ($_FILES['file']['size'] > 0) {
       	            $filename  = $_FILES["file"]["name"];

       	            $name = substr($filename, -3);
       	            if ($name != "csv"){
       		             echo "loi";
       	            }else{
                        self::file_permission($filename);
                        $file      = fopen($filename,"r");
       	                while ($emapData = fgetcsv($file,1000,",")) {	
       	                    $this->modelUserPDO->InsertCSV($emapData);
       	  	            }
       		        }
       	        }
            }
        }
        //xoa user
        public function delete(){
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $this->modelUserPDO->DeleteUser($id);
            }
        }
        //trang login
        public function login()
        {
            $error  = new stdClass();    
            if (isset($_POST['submit'])) {
                $_SESSION['email']    = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                $data    = $this->getAllUser;
                $email   = $_SESSION['email'];
                $password= $_SESSION['password'];
                foreach ($data as $key) {    
                    if ($key['password'] == $password && $key['email'] !== $email)
                    {
                        $error->email    = "<p> email khong dung</p>";    
                    }elseif($key['password']  !== $password && $key['email'] == $email){
                        $error->password = "password khong dung";
    
                    }elseif ($key['password']  == $password && $key['email'] == $email) {
                         header("location:index.php?controller=PDOhome&action=selectUser");
    
                    }
                }
                return;
            }
            $this->views("Trangchu",[
                "pages" => "login",
                "error" => $error,
            ]);
        }
         //gửi mail
        public function sendMail()
        { 
            if ((isset($_POST['email'])&&$_POST['email'] != "")&&(isset($_POST['subject'])&&$_POST['subject'] != "")&
                (isset($_POST['comment'])&&$_POST['comment'] != "")) {
                    $email   = $_POST['email'];
                    $body    = $_POST['comment'];
                    $subject = $_POST['subject'];
                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->SMTPDebug  = 1;  
                    $mail->SMTPAuth   = true;
                    $mail->SMTPSecure = "tls";
                    $mail->Port       = 587;
                    $mail->Host       = "smtp.gmail.com";
                    $mail->Username   = "maivantue29@gmail.com";
                    $mail->Password   = "maivantue1994";
                    $mail->IsHTML(true);
                    $mail->AddAddress($email, "tue");
                    $mail->SetFrom("maivantue29@gmail.com", "tue");
                    $mail->AddReplyTo("maitue29@gmail.com", "maitue");
                    $mail->msgHTML($body);
                    $mail->Subject =  $subject;
                    if(!$mail->send()){
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }else{
                         echo "Message sent!";
                    }
                    return;
            }            	 
            $this->views("Trangchu",[
               "pages"  => "SendMail"
            ]);
 
        }
        //search  su dung ajax json jquery
        public function searchJS()
        {
            
            if (isset($_POST["id"])) 
            { 
                $id    = $_POST["id"];
                $data1 = $this->modelUserPDO->selectId($id);
                
                $data   =[];
                foreach ($data1 as $key) 
                {
                    $data["name"]    = $key["username"];
                    $data["password"]= $key["password"];
                    $data["email"]   = $key["email"];
                }
                echo json_encode($data);
                return;
            }
            $this->views("Trangchu",[
   	            "pages"   => "search-JS",
   	            "dt"      => $this->getAllUser,
                ]);
            }
         //
        public function demoAjax(){
            if (isset($_POST['id'])) {
                $id   = $_POST['id'];
                $data = $this->modelUserPDO->selectId($id);
                    foreach ($data as $key) {
                        $data1['name']     = $key["username"];
                        $data1['password'] = $key["password"];
                        $data1['email']    = $key['email'];
                    }
                    echo  json_encode($data1);
                    return;
            }
        
            $this->views("Trangchu",[
                "pages" => "exampleAjax",
                "dt"    => $this->getAllUser,
            ]);
        
        }
        public function cURL(){
            $this->views("Trangchu",[
                "pages" =>"curl", 
            ]);
        }
        public function curlPost(){
            $curl = new cURL();
            $form_data=[];
            if (isset($_POST['submit'])) {
                $username  = $_POST['username'];
                $password  = $_POST['password'];
                $address   = $_POST['address'];
                $email     = $_POST['email'];
                $form_data = array('username'=> $username,
                                   'password'=> $password,
                                   'address' => $address,
                                   'email'   => $email,
                            );
                
                $curl1  = "http://127.0.1.1/Trainning_php/tuan-hai/MVCdemo/index.php?Controller=PDOhome&action=curlPost";
                
                $html   = $curl->post($curl1,$this->modelUserPDO->insertUser($username,$password,$address,$email));
                
                
            }

            $this->views("Trangchu",[
                "pages" =>"curlPost", 
            ]);
        }
         

}
 ?>