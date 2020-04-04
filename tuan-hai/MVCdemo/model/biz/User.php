<?php 
    require_once 'model/dbtable/Users.php';
    /**
     * 
     */
   
    class User extends Users_dbtable_Users
    {
        private $dbUsers;
        function __construct(){
            $this->dbUsers= new Users_dbtable_Users();
        }

        public function getlistUser(){
            return $this->dbUsers->getList();
        }
        public function getlistBook(){
             $fields=["name","title","images"];
          return $this->dbUsers->getListBooks('name','',null,[]);
        }
        
    }
 ?>