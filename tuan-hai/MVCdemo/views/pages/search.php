<div class="row">
    <form action="" method="GET">
        <label>Tim Kiem</label>
        <input type="text" name="search" id="search"
        value="<?php if (isset($_GET['search'])) {
            echo($_GET['search']);
         }?>">
        <input type="hidden" name="Controller" value="PDOhome">
        <button type="submit" name="action" value="search"> Tim Kiem </button>
        <input type="submit" name="action" id="export" value="export" >
    </form>

</div>

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
                    <th scope="col">EMAIL</th>
                </tr>
            </thead>
            <?php foreach ($data["DATA"] as $key=>$value){ ?>
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo ++$key ?>
                        </th>
                        <td>
                            <?php echo $value['id'] ?>
                        </td>
                        <td>
                            <?php echo $value['username'] ?>
                        </td>
                        <td>
                            <?php echo $value['password'] ?>
                        </td>
                        <td>
                            <?php echo $value['address'] ?>
                        </td>
                         <td>
                            <?php echo $value['email'] ?>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
        </table>
        <div style="display: display ">
            <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                    <a href="index.php?page=1&Controller=PDOhome&action=search " class="nav-link" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                </li>

                <?php for($p=1; $p<=$data['total']; $p++){?>
                    <li class="paginate_button page-item active">
                        <a href="<?= '?page='.$p.'&Controller=PDOhome&action=search';?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">
                            <?= $p; ?>
                        </a>
                    </li>
                <?php }?>
                    <li class="paginate_button page-item next" id="dataTable_next"><a href="<?= '?page='.$data['total'].'&Controller=PDOhome&action=search';?>" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Last</a>
                    </li>
            </ul>
        </div>   
     
    </div> 
     
</div>