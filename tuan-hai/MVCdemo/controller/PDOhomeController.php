<?php 

require_once 'config/controller.php';
require_once 'src/PHPMailer.php';
require_once 'src/Exception.php';
require_once 'src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class PDOhomecontroller extends controller

{
    private $modelUserPDO;
        function __construct()
        {
            $this->modelUserPDO = $this->model('PDOuser');
        }
          // lấy ra danh sách user 
        public function selectUser() 
        {
            $this ->views("Trangchu",[
                "pages" => "ListUserPDO",
                "DT"    => $this->modelUserPDO->getUser(),
            ]);
        }
         //search 
        public function search()
        {
            if (empty($_GET['search'])) {
                $this->views("Trangchu", [
                    "pages"      => "search",
                    "DATA"       => $this->modelUserPDO->getUser(),
                ]);
            }else {
                $keyword = $_GET['search'];
                $data = $this->modelUserPDO->searchUser($keyword);
                $this->views("Trangchu", [
                    "pages"      => "search",
                    "DATA"       => $this->modelUserPDO->searchUser($keyword),
                ]);
            }
        }
        //export file csv
        public function export()
        {
            if (empty($_GET['search'])) {

                $this->views("Trangchu", [
                    "pages"      => "search",
                    "DATA"       => $this->modelUserPDO->getUser(),
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
                    "DATA"       => $this->modelUserPDO->searchUser($keyword),
                ]);
            }
        }
        // phân trang 
        public function pagination()
        {
            $this->views("Trangchu",[
                "pages"      => "Pagination",
                "DT"         => $this->modelUserPDO->PaginationT(),
                "total"      => $this->modelUserPDO->TotalP(),
            ]);
        }
        //inport file csv
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
                $data    = $this->modelUserPDO->getUser();
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
            }
            $this->views("Trangchu",[
                "pages" => "login",
                "error" => $error,
            ]);
        }
         //gửi mail
        public function sendMail()
        { 
            if ((isset($_POST['email']))&&(isset($_POST['phone'])&&$_POST['phone'] != "")&
                (isset($_POST['subject']))) {
                    $email   = $_POST['email'];
                    $body    = $_POST['comment'];
                    $subject = $_POST['subject'];
                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->SMTPDebug  = 1;  
                    $mail->SMTPAuth   = TRUE;
                    $mail->SMTPSecure = "tls";
                    $mail->Port       = 587;
                    $mail->Host       = "smtp.gmail.com";
                    $mail->Username   = "tuemvd00660@fpt.edu.vn";
                    $mail->Password   = "1994maitue";
                    $mail->IsHTML(true);
                    $mail->AddAddress($email, "tue");
                    $mail->SetFrom("tuemvd00660@fpt.edu.vn", "tue");
                    $mail->AddReplyTo("maivantue29@gmail.com", "maitue");
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
   	            "dt"      => $this->modelUserPDO->getUser(),
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
                "dt"    => $this->modelUserPDO->getUser(),
            ]);
        
        }
}
 ?>