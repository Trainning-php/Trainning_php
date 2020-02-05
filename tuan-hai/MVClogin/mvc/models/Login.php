<?php 
	/**
	 * 
	 */
	class Login extends Db
	{
		

		public function SelectAdmin(){
			$qr="SELECT * FROM admin";
		  return mysqli_query($this->con,$qr);
		}

	}
 ?>