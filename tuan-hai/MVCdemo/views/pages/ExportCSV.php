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
        <div>
            <form action="" method="POST" >
                <input type="submit" name="export" id="export" value="export">
                 <input type="hidden" name="controller" value="PDOhome">
                 <input type="hidden" name="action" value="ExportCSV">
            </form>
        </div>
    </div>  
</div>
 