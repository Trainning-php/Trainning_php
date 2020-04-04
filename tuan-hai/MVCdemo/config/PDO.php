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
            $connect         = new connectPDO();
            $this->conn      = $connect->connectDB();
        }
        
        public function querySql($sql,$value){
            $result    = $this->conn->prepare($sql);
            $result->execute($value);
            $data     = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        public function getAll() 
        {
            $limit     = 2;
            if (!isset($_GET['page'])) {
                $page  = 1;
            } else{
                $page  = $_GET['page'];
            }
            $start     = ($page-1)*$limit;
            $sql      = $this->sqlQuery;

            $sql .=  ' ORDER BY  id ASC LIMIT ' . $start . ',' .$limit;

            return self::querySql($sql,null);
        }

        public function search($keyword) 
        {
            $limit     = 2;
            if (!isset($_GET['page'])) {
                $page  = 1;
            } else{
                $page  = $_GET['page'];
            }
            $start     = ($page-1)*$limit;
            $sql      =  $this->sqlQuery ;
            $sql.= " WHERE username REGEXP '$keyword' OR  address REGEXP '$keyword' OR email REGEXP '$keyword' OR password REGEXP '$keyword' ORDER BY  id ASC LIMIT $start,$limit";
           return self::querySql($sql,null);
        }

        public function totalPages()
        {
            $limit         = 2;
            $sql           = "$this->sqlQuery user ";
            $result        = $this->conn->prepare($sql);
            $result->execute();
            $total_results = $result->rowCount();
            $total_pages   = ceil($total_results/$limit);
            return $total_pages;
        }

        public function paginations() 
        {
            $limit     = 2;
            if (!isset($_GET['page'])) {
                $page  = 1;
            } else{
                $page  = $_GET['page'];
            }
                $start     = ($page-1)*$limit;
                $sqlLimit  = $this->sqlQuery ;
                $sqlLimit  .= " ORDER BY id ASC LIMIT $start,$limit";
                return self::querySql($sqlLimit,null);
        }

        public function insertData($data)
        {
            $query = "INSERT INTO admin (username,password) VALUES (?,?)";
            $stm   = $this->conn->prepare($query);
            $stm->execute($data);
            return $stm;
        }
        public function insertDataUser($data)
        {
            $query = "INSERT INTO user (username,password,address,email) VALUES (?,?,?,?)";
            $stm   = $this->conn->prepare($query);
            $stm   = $stm->execute($data);
            return $stm;
        }

        public function delete($id)
        {
            $query = "DELETE FROM user WHERE id = ? ";
            $res   = $this->conn->prepare($query);
            $res->execute([$id]);
            return $res;
        }

        public function selectByID($id)
        {
            $query =  $this->sqlQuery."WHERE id = ?";
            return  self::querySql($query,[$id]);
        }

}
 ?>