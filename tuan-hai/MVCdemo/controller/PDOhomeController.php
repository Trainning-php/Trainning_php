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

	    public function selectUser(){
		    $this ->views("Trangchu",[
	     		"pages" => "ListUserPDO",
	     		"DT"    => $this->modelUserPDO->getUser(),
	     	]);
	      }

	   public function Search(){
	 	if (empty($_GET['search'])) {
	 		$this->views("Trangchu", [
	 		"pages"      => "search",
			"DATA"       => $this->modelUserPDO->getUser(),
	 	]);
	 	}else {
			 $keyword = $_GET['search'];
	 		 $data    = $this->modelUserPDO->searchUser($keyword);
	 		 $this->views("Trangchu", [
	 			"pages"      => "search",
	 			"DATA"       => $this->modelUserPDO->searchUser($keyword),
	 			]);

	 	}
	  }

	  public function Pagination(){
	   $this->views("Trangchu",[
	     "pages"      => "Pagination",
		 "DT"         => $this->modelUserPDO->PaginationT(),
		 "total"      => $this->modelUserPDO->TotalP(),
			]);
	 	}
	
		 public function ExportCSV(){
		 	if (empty($_GET['export'])) {
		 		$this->views("Trangchu",[
		 		"pages"      => "ExportCSV",
		 		]);
		 	}else{
		 	 $keyword = $_GET['export'];
	 		 $data    = $this->modelUserPDO->searchUser($keyword);
	 		
	 		 $this->views("Trangchu", [
	 			"pages"      => "ExportCSV",
	 			"DATA"       => $this->modelUserPDO->searchUser($keyword),
	 			]);
	 		}
		 } 
		 public function inportCSV(){
		 	if (isset($_POST['submit'])) {
		 		$filename  = $_FILES["file"]["name"]; 
		 		if ($_FILES['file']['size'] > 0) {
		 			$file  = fopen($filename,"r");
		 		  while ($emapData = fgetcsv($file,1000,",")) {
		 			 $this->modelUserPDO->InsertCSV($emapData);
		 		  }
		 		}
		 		 echo 'Projects imported';
		 	}else{
		 		echo "that bai";
		 	}
		 		$this->views("Trangchu",[
		 	      "pages"   =>"inportCSV",
		 		]);

		 }
		}
 ?>
