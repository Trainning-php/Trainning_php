<?php 
    /**
     * 
     */
require_once 'config/connect.php';
class Users_dbtable_Users extends ConnectPDO
    {
        const TABLE_NAMES = 'books';
        private $conn;
    	    function __construct()
    	    {
    	    	$conectdb    = new connectPDO(); 
                $this->conn  = $conectdb->connectDB();
    	    }

    	    public function getList()
    	    {
                $sql     = 'SELECT * FROM ';
                $sql    .= self::TABLE_NAMES;
                $result  = $this->conn->prepare($sql);
                $result->execute();
                $data    = $result->fetchAll(PDO::FETCH_ASSOC);
                return $data ;    
    	    }

            public function getListBooks($aryField = ['*'],$keyword=[],$id,$fields=[]){
                $sql  = 'SELECT '.$aryField.' FROM ';
                $sql .= self::TABLE_NAMES;
                $whereStatement = " ";
                // $fields=["name","title","images"];
                if ( null !== $keyword) {
                    
                    foreach (array_keys($fields) as $index => $field) {
                    $whereStatement .= ($index === 0 ? " WHERE " : " OR ").$fields[$field]." LIKE '%".$keyword."%'" ;
                    }
                    $sql .= $whereStatement;
                }
                if (null!== $id) {
                    $sql .= " ORDER BY ". $id." ASC";
                }
                
                return $sql; 
            }
            
            public function update($table,$data){
                $sql   =  ' UPDATE ' . $table;
                $sql  .=  ' SET ';
                $sql  .=  ' name = ? , title = ? , images = ? WHERE id = ?';
            return  $stmt  = $this->conn->prepare($sql)->execute($data);
                
            }

            public function insert($table,$data,$values,$arrData){
                $sql     = " INSERT INTO ".$table;
                $sql    .=  $data  ;
                $sql    .= " VALUES ".$values;
                $result  = $this->conn->prepare($sql);
                $result->execute($arrData);
                return $result ;
            }
    	
    }
?>