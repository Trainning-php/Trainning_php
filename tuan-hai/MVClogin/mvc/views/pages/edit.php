
<?php 
  var_dump($data["ED"]) ;
 ?>

<div class="row">
  <form class="form-inline" action="/action_page.php" method="POST">
  <label for="email" class="mr-sm-2">Hoten</label>
  <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $ED['hoten'] ?>" id="hoten">
  <label for="pwd" class="mr-sm-2">NamSinh:</label>
  <input type="text" class="form-control mb-2 mr-sm-2" value="<?php echo $ED['namsinh'] ?>" id="namsinh">

  <button type="submit" class="btn btn-primary mb-2">Submit</button>
</form>
</div>