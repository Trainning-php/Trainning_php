<table>
	<thead>
		<tr>
			<th>id</th>
			<th>username</th>
			<th>password</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data['selectUser'] as $key => $value): ?>
		<tr>
			<td><?php echo $value['id'] ?></td>
			<td><?php echo $value['name'] ?></td>
			<td><?php echo $value['title'] ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>