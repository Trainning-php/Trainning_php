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
			 $data = $this->modelUserPDO->searchUser($keyword);
	 		 $this->views("Trangchu", [
	 			"pages"      => "search",
	 			"DATA"       => $this->modelUserPDO->searchUser($keyword),
	 			]);

	 		}
	 	}
	  public function Export(){
			      	if (empty($_GET['search'])) {
			 		$this->views("Trangchu", [
			 		"pages"      => "search",
					"DATA"       => $this->modelUserPDO->getUser(),
			 	]);
			 	}else {
			 		$keyword = $_GET['search'];
					$data = $this->modelUserPDO->searchUser($keyword);
					    $openfile = fopen("DataSearch.csv","w")or die("Unable to open file!");
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
	  public function Pagination(){
	   $this->views("Trangchu",[
	     "pages"      => "Pagination",
		 "DT"         => $this->modelUserPDO->PaginationT(),
		 "total"      => $this->modelUserPDO->TotalP(),
			]);
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
		 		 echo 'Thành Công ';
		 	}else{
		 		echo "Thất bại";
		 	}
		 		$this->views("Trangchu",[
		 	      "pages"   =>"inportCSV",
		 		]);
		 }

	}
 ?>