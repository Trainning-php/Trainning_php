<div class="row">
    <form action="" method="GET">
        <label>Tim Kiem</label>
        <input type="text" name="search" id="search"
        value="<?php if (isset($_GET['search'])) {
            echo($_GET['search']);
         }?>">
        <input type="hidden" name="controller" value="PDOhome">
        <button type="submit" name="action" value="search"> Tim Kiem </button>
        <input type="submit" name="action" id="export" value="export" >
        
    </form>
</div>
<script type="text/javascript">

</script>
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
            <?php $id=1;foreach ($data["DATA"] as $key): ?>
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
    </div>  
</div>