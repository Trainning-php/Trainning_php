<div class="container" style="width: 800px;">
   <h2 align="center"> Return JSON Data form PHP Script using Ajax Jquery</h2>
   <h3 align="center">Search Data </h3>
   <div class="row">
   	  <div class="col-md-4">
   	  	<select name="list_data" id="list_data" class="form-control">
   	  		<option value="">Select Data</option>
   	  		 <?php 
   	  		  foreach ($data["dt"] as $key) {
   	  		  	echo '<option value="'.$key["id"].'">'.$key["username"].'</option>';
   	  		  }
   	  		  ?>
   	  	</select>
   	  </div>
   	  <div class="col-md-4">
   	  	<button type="button" name="searchJs" id="searchJs" class="btn btn-info" 	>Search</button>		
   	  </div>		
   </div>
   <div class="row"  >
   	 <div class="table-responsive" id="table_data" style="display: none;">
   	   <table class=" table table-bordered">
   	   	<tr>
   	   	  <td width="10%" align="right"><b>name</b></td>
   	   	  <td width="90%"><span id="data_name"></span> </td>
   	   	</tr>
   	   	<tr>
   	   	  <td width="10%" align="right"><b>password</b></td>
   	   	  <td width="90%"><span id="data_password"></span> </td>
   	   	</tr><tr>
   	   	  <td width="10%" align="right"><b>email</b></td>
   	   	  <td width="90%"><span id="data_email"></span> </td>
   	   	</tr>	
   	   </table>
     </div>
   	</div>	
</div>