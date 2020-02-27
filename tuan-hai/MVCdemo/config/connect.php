<?php
class ConnectPDO
{
   private $pdo;
   private $host    = '127.0.0.1';
   private $db      = 'mvc';
   private $user    = 'tue';
   private $pass    = 'root';
   private $charset = 'utf8mb4';

   function __construct()
   {
	 $dsn       = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
	 $this->pdo = new PDO($dsn,$this->user,$this->pass);
   }
		
   function connectDB()
   {
	 return $this->pdo;
   }
}
 ?>