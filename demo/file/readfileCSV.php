<?php 
$file="demo.csv";
	$fileOpen=fopen($file,'r');
	while ($data=fgetcsv($fileOpen,100,',')) {
		list($name,$address,$age)=$data;
		echo $name.''.$address.''.$age	;
	}
 ?>