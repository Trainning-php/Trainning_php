<?php 
$file="docghifile/text.txt";

	try {
		if (file_exists($file)) {
			$fp = fopen($file, 'w')or die("khong mo duoc file de ghi");
				$txt="hello";
				fwrite($fp, $txt);
				fclose($fp);
		}
	} catch (Exception $e) {	
		
	}
 ?>