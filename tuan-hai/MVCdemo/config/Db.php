<?php 
	/**
	 * 
	 */
	class  Db
	{
		private $conn;
		private $servername='localhost';
		private $username='tue';
		private $password='root';
		private $DbName='mvc';
		function __construct()
		{
			$this->conn=mysqli_connect($this->servername,$this->username,$this->password);
			mysqli_select_db($this->conn,$this->DbName);
			mysqli_query($this->conn,"SET NAMES 'utf8'");	
		}
		 public function fetchAll($table)
        {
            $sql = "SELECT * FROM {$table} WHERE 1" ;
            $result = mysqli_query($this->conn,$sql) or die("Lỗi Truy Vấn fetchAll " .mysqli_error($this->conn));
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

	}
 ?>