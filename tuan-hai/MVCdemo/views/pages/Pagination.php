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
                </tr>
            </thead>
            <?php $id=1;foreach ($data["DT"] as $key): ?>
                <tbody>
                    <tr>
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
                    </tr>
                </tbody>
                <?php endforeach ?>
        </table>
        <div style="display: display ">
            <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                    <a href="index.php?page=1&controller=PDOhome&action=Pagination " class="nav-link" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                </li>
                <?php for($p=1; $p<=$data['total']; $p++){?>
                    <li class="paginate_button page-item active">
                        <a href="<?= '?page='.$p.'&controller=PDOhome&action=Pagination';?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">
                            <?= $p; ?>
                        </a>
                    </li>
                    <?php }?>
                        <li class="paginate_button page-item next" id="dataTable_next"><a href="<?= '?page='.$data['total'].'&controller=PDOhome&action=Pagination';?>" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Last</a></li>
            </ul>
        </div>

    </div>
</div>