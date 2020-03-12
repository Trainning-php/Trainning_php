<?php
class ConnectPDO
{
    private static $pdo;
    private $conn;
    private $host    = '127.0.0.1';
    private $db      = 'mvc';
    private $user    = 'tue';
    private $pass    = 'root';
    private $charset = 'utf8mb4';

        function __construct()
        {
            $dsn       = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
            self::$pdo = new PDO($dsn,$this->user,$this->pass);
        }
        function connectDB()
        {    
            if (!isset(self::$pdo)) {
                self::$pdo = new ConnectPDO();
            }
            return self::$pdo;
        }
}
 ?>