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
			<td><?php echo $value['books_id'] ?></td>
			<td><?php echo $value['books_author'] ?></td>
			<td><?php echo $value['books_title'] ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>