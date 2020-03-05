<form name="frm_user" id="frm_user" method="post" enctype="multipart/form-data">
    <table class="table-item">
        <colgroup>
            <col class="w100"/> 
            <col class="w200"/>
            <col class="w100"/>
            <col class="w199"/>
        </colgroup>
        <tr>
            <th>ID</th>
            <td>
                <select name="list_data" id="list_data" class="form-control">
            <option value="">Select Data</option>
             <?php 
              foreach ($data["dt"] as $key) {
                echo '<option value="'.$key["id"].'">'.$key["username"].'</option>';
              }
              ?>
        </select>
            </td>
            <th></th>
            <td>
            </td>
        </tr>
        <tr>
            <th>
                </th>
            <td colspan="3">
                <div class="wrap w510">
                </div>
            </td>
        </tr>
        <tr>
            <th>demo</th>
            <td colspan="3">
            </td>
        </tr>
    </table>

</form>
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
<div class="text-center mar-t10 mar-b5">
    <input type="button" value="Dangky" onclick="user.showUser()"/>
    <input type="button" value="cancel" onclick="user.cancelDemo()"/>
     <input type="button" value="showOverlay" onclick="user.showOverlay()"/>
</div>