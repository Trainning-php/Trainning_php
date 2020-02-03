<?php 
	$dir="file";
	 
	$filename=scandir($dir);
	var_dump($filename);	
	//$filename="newfile.txt";
	$file_parts = pathinfo($filename);

	switch($file_parts['extension'])
		{	
			case "txt":
			$file="file.txt";
				if ($filename===$file) {
				$myfile = fopen($file, "w") or die("Unable to open file!");
				$txt = "Mickey Mouse\n";
				fwrite($myfile, $txt);
				fclose($myfile);
			 }
			
			break;
		    case "jpg":
		    break;

		    case "exe":
		    break;

		    case "csv":

		    break;


		    case "": 
		    case NULL: 
		    break;
		}
 ?>