<?php 
class SVmodel extends Db{
	public function GetSV(){
		return "maivantue";
	}
	public function Tong($a,$b){
		return $a+$b;
	}
	public function DanhSachSV(){
		$qr="SELECT * FROM SinhVien";
		return mysqli_query($this->con,$qr);
	}
}
 ?>
