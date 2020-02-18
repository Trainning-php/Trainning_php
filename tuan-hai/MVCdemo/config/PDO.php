<?php 
/**
 * 
 */
require_once 'connect.php';
class PDOquery extends ConnectPDO 
{
	private $conn;
	private $sqlQuery  = "SELECT * FROM user";

	function __construct()
	{
		$connect    = new connectPDO();
		$this->conn = $connect->connectDB();
	}
	public function getAll() {

		$sql      = " $this->sqlQuery";
		$sth      = $this->conn->prepare($sql);
		$sth->execute();
		$result   = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		
	}

	public function search($keyword) {
		$sql      = " $this->sqlQuery user WHERE username REGEXP '$keyword' ORDER BY id ASC";
		$result   = $this->conn->prepare($sql);
		$result->execute();
		$data     = $result->fetchAll(PDO::FETCH_ASSOC);
		return $data;

		}

	public function TotalPages(){
		$limit         = 3;
		$sql           = "$this->sqlQuery user ";
		$result        = $this->conn->prepare($sql);
		$result->execute();
		$total_results = $result->rowCount();
		$total_pages   = ceil($total_results/$limit);
		return $total_pages;
	}

	public function Paginations(){
		$limit    = 4;
		  if (!isset($_GET['page'])) {
	        $page = 1;
	    } else{
	        $page  = $_GET['page'];
	    }
	    $start     = ($page-1)*$limit;
	    $sqlLimit  = "$this->sqlQuery ORDER BY id ASC LIMIT $start, $limit";
	    $stmt      = $this->conn->prepare($sqlLimit);
	    $stmt->execute();
	    $results   = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    return $results;
	}

	public function InsertData($data){
		$query = "INSERT INTO admin (username,password) VALUES (?,?)";
		$stm   = $this->conn->prepare($query);
		$stm->execute($data);
		return $stm;
	}

}
 ?>