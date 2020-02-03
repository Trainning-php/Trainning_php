<?php
try {
	$file="newfile.txt";
	if (file_exists($file)) {
		$myfile = fopen($file, "w") or die("Unable to open file!");
		$txt = "Mickey Mouse\n";
		fwrite($myfile, $txt);
		$txt = "Minnie Mouse\n";
		fwrite($myfile, $txt);
		echo "ghi file thanh cong";
		fclose($myfile);
	}
	} catch (Exception $e) {
		error_log($e);
}
?>
