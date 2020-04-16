<?php 
    require_once 'config/connect.php';
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

            return $this->dbUsers
                        ->getList();
        }

        public function getlistBook(){
            $fields = [" name " , " title ", " images " ];

            return $this->dbUsers
                        ->getListBooks(' name ',' ', null , [] );
        }

        public function insertData($arrdata){
            $table  = 'books';
            $data   = " ( name , title , images ) ";
            $values = " ( ? , ? , ? ) ";

            return $this->dbUsers
                        ->insert( $table , $data , $values , $arrdata);
        }
        public function updateData($table,$data){
         return  $this->dbUsers
                             ->update($table,$data);
            //echo $sql;
        //return $this->dbUsers->update($table);
        }
        public function isertUsers($arrData){
            
            $table  = " user ";
            $data   = " ( username , password , address , email ) ";
            $values = " ( ? , ? , ? ,? ) ";

            return  $this->dbUsers
                         ->insert( $table , $data , $values , $arrData) ;
        }
    }
 ?>