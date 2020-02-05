<?php 
	class Db {
		public $con;
		public $servername='localhost';
		public $username='tue';
		public $password='root';
 		public $DbName='mvc';
 		// ket noi db
		function __construct(){
			$this->con = mysqli_connect($this->servername,$this->username,$this->password);
			mysqli_select_db($this->con,$this->DbName);
			mysqli_query($this->con,"SET NAMES 'utf8'");
			
		}
		// show data
		   public function fetchAll($table)
        {
            $sql = "SELECT * FROM {$table} WHERE 1" ;
            $result = mysqli_query($this->con,$sql) or die("Lỗi Truy Vấn fetchAll " .mysqli_error($this->con));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }
        
           public function fetchID($table , $id )
        {
            $sql = "SELECT * FROM {$table} WHERE id = $id ";
            $result = mysqli_query($this->con,$sql) or die("Lỗi  truy vấn fetchID " .mysqli_error($this->con));
            return mysqli_fetch_assoc($result);
        }
	}
 ?>