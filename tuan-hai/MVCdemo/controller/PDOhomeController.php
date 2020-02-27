<?php 

 require_once 'config/controller.php';
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
	 public function pagination()
	 {
	   $this->views("Trangchu",[
	     "pages"      => "Pagination",
		 "DT"         => $this->modelUserPDO->PaginationT(),
		 "total"      => $this->modelUserPDO->TotalP(),
			]);
	 }
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

	 public function delete(){
	  	
	  }
	 public function login()
	 {
	 	$error=new stdClass();
	   if (isset($_POST['submit'])) {
	    $_SESSION['email']    = $_POST['email'];
	 	$_SESSION['password'] = $_POST['password'];
	 	$data    = $this->modelUserPDO->getUser();
	 	$email   = $_SESSION['email'];
	 	$password= $_SESSION['password'];
	 	// var_dump($data);
	 	// die;
	 
	 	// var_dump($error);
	 	// die;
	 	foreach ($data as $key) {

	 	 if ($key['password'] == $password &&$key['email'] !== $email)
	 	  	{
	 	  		$error->email = "<p> email khong dung</p>";
	 		}elseif($key['password'] !== $password && $key['email'] == $email){
	 			$error->password ="<p>password khong dung</p>";
	 		}elseif ($key['password'] == $password && $key['email'] == $email) {
	 			header("location:index.php?controller=PDOhome&action=selectUser");
	 		}elseif ($key['password'] !== $password && $key['email'] !== $email) {
	 			$error->email = "<p> email khong dung</p>";
	 			$error->password ="<p>password khong dung</p>";
	 		}
	 	  }		
	 	}
	  	 $this->views("Trangchu",[
	  	  "pages" => "login",
	  	  "error" => $error,
	  	  ]);
	  }
	 public function sendMail()
	 {	 
	 	  $this->views("Trangchu",[
	  	  "pages"  => "SendMail"
	  	]);
	 }
	 public function formData(){
	 
	   $this->views("Trangchu",[
	   	"pages"   => "formData"
	 	]);
	 }
}
 ?>