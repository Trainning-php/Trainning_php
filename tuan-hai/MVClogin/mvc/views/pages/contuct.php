
<div>
	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">ID</th>
      <th scope="col">hoten</th>
      <th scope="col">namsinh</th>
       <th scope="col">SuaXoa</th>
    </tr>
  </thead>
  <tbody>
  	<?php $stt=1;foreach($data["SV"] as $key): ?>
    <tr>
      <th scope="row"><?php echo $stt++?></th>
      <td><?php echo $key["id"] ?></td>
      <td><?php echo$key["hoten"] ?></td>
      <td><?php echo $key["namsinh"];?></td>
      <td><a href="edit?id=<?php echo $key['id']?>">sua</a> | | 
      	<a href="delete?id=	<?php echo $key['id'] ?>">xoa</a></td>
    </tr>
    <?php endforeach ?> 
  </tbody>
</table>
</div>