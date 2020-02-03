<?php
$dir="file";
$filename="newfile.txt"; 
$files1=scandir($dir);
var_dump($files1);	
$file_parts = pathinfo($filename);

// switch($file_parts['extension'])
// {	
// 	case "txt":

// 	break;
//     case "jpg":
//     break;

//     case "exe":
//     break;

//     case "csv":

//     break;


//     case "": 
//     case NULL: 
//     break;
// }

 ?>
