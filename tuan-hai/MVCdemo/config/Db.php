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
          public function fetchID($table , $id )
        {
            $sql = "SELECT * FROM {$table} WHERE id = $id ";
            $result = mysqli_query($this->conn,$sql) or die("Lỗi  truy vấn fetchID " .mysqli_error($this->conn));
            return mysqli_fetch_assoc($result);
        }
       	
            public function delete ($table ,  $id )
        {
            $sql = "DELETE FROM {$table} WHERE id = $id ";

            mysqli_query($this->conn,$sql) or die (" Lỗi Truy Vấn delete   --- " .mysqli_error($this->conn));
            return mysqli_affected_rows($this->conn);
        }
        public function update($table,$username,$password,$id){
                $sql="UPDATE {$table} SET username='$username',password='$password' WHERE id=$id";
                mysqli_query($this->conn,$sql) or die ("Loi truy van update ".mysqli_error($this->conn));
                  
            }
           
	}
 ?>       
