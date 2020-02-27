<form method="POST" class="form_sendmail" id="form_sendmail"action=" index.php?&controller=PDOhome&action=sendmail" id="form_sendmail">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" id="email" >
  </div>
  <div class="form-group">
    <label for="exampleInputPhone">Phone</label>
    <input type="text" class="form-control" id="exampleInputPhone" placeholder="Phone" name="phone" id="phone">
  </div >
   <input type="submit" name="action" value="sendmail" >
</form>