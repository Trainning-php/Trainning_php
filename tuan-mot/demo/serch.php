<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="serch.php" method="POST">
		<label>tim kiem </label>
		<input type="text" name="keyword" id="akeyword">
		<input type="submit" name="btnkeyword" value="submit">

		<?php 
		$servername = "localhost";
		$username = "tue";
		$password = "root";
		$dbname = "Demo";
		$conn=mysqli_connect($servername,$username,$password,$dbname);
			
			if (isset($_POST["btnkeyword"])) {

				$keyword=$_POST['keyword'];

				$sql="SELECT * FROM admin WHERE name like '%$keyword%'";
				$result = $conn->query($sql);
				
				$num_row=mysqli_num_rows($sql);

					if ($num_row ==0) {
			?>
		khong tim thay ket qua <?php echo $keyword ;?>	
			<?php 
			}else{
			?>

		tim kiem voi tu khoa <?php echo $keyword ?> co <?php echo $num_row; ?> ket qua;
					<ul> 
						<?php 
						while ($row=mysqli_fetch_array($sql)) {
						 ?>
						 <li>
						 	<?php echo $row["name"]; ?>
						 </li>
						 	<?php
						}
					echo "</ul>";

				}
			}
		 ?>
	</form>
</body>
</html>