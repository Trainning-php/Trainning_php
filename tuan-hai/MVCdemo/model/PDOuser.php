<?php 
/**
 * 
 */
require_once 'config/PDO.php';
class PDOuser extends PDOquery
{
  public function getUser() {
	  return $this->getAll();
	}
  public function searchUser($keyword) {
    $data =$this->search($keyword);
 
	  return $data;
	}
  public function PaginationT(){
  	return $this->Paginations();

  } 
  public function TotalP(){
  	return $this->TotalPages();
  }
  public function InsertCSV($data){
    return $this->InsertData($data);
  }
  public function DeleteUser($id){
    return $this->delete($id);
  }
  public function selectId($id){
    return $this->selectByID($id);
  }
}
 ?>