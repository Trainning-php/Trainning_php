 
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Danh Sach user</title>
 </head>
 <body>
 	<table style="border: solid 1px red;">
 		<thead >
 			<tr>
 				<th>STT</th>
 				<th>Username</th>
 				<th>Password</th>
 			</tr>
 		</thead>
 		<?php foreach ($data['US'] as $key ): ?>
 		<tbody>
 			<tr>
 				<td><?php echo $key['id']; ?></td>
 				<td><?php echo $key['username']; ?></td>
 				<td><?php echo $key['password']; ?></td>
 				<td> <a href="index.php?controller=home&action=edit&id=<?php echo $key['id']?>">sua</a> </td>
 				<td><a href="index.php?controller=home&action=delete&id=<?php echo $key['id']?>">xoa</a> </td>
 		</tbody>
 		<?php endforeach ?>
 	</table>
 </body>
 </html>