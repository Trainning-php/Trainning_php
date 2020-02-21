<div class="row">
    <div align="center">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">PASSWORD</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                 <?php $id=1;foreach ($data["DT"] as $key): ?>
                
                    <tr id="#<?php echo $id?>">
                        <th scope="row">
                            <?php echo $id++ ?>
                        </th>
                        <td>
                            <?php echo $key['id'] ?>
                        </td>
                        <td>
                            <?php echo $key['username'] ?>
                        </td>
                        <td>
                            <?php echo $key['password'] ?>
                        </td>
                        <td>
                            <?php echo $key['address'] ?>
                        </td>
                        <td><a href="index.php?id=<?php echo $key['id'] ?>&controller=PDOhome&action=delete" class="XoaUser">xoa</a></td>            
                    </tr>
              
                <?php endforeach ?>
            </tbody>
          
        </table>
        <!-- Trang:
        <?php 
			$a=5;
			for ($i=1; $i <$a ; $i++) { 
				echo '<a href="index.php?page='.$i.'&controller=PDOhome&action=selectUser "> '.' '.$i.' '.' </a>';
			}
		 ?> -->
    </div>
</div>