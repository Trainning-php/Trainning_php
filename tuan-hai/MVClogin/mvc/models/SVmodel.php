<?php 
class SVmodel extends Db{

	public function DanhSachSV(){
		
		return $this->fetchAll('SinhVien');
	}
	function getInput($string){
		return isset($_GET[$string]) ? $_GET[$string]:'';

	}
	public function DanhSachSVID(){
		
		return $this->fetchID('SinhVien',$id);
	}

}
 ?>
