var user = {
  ERROR_MESSAGE: "loi tum lum khó chịu (@.@)",
  isClickOk:false,
  showOverlay: function() {
    var id = $("#list_data").val();
    console.log(id);
    if (id == '') {
       alert("write someting! ");
     }else{
     $.ajax(
       { 
          url:"index.php?&controller=PDOhome&action=demoAjax",
          method:"POST",
          dataType:"JSON",
          data:{id:id},
          success:function(data){
             user.showData(data);
         }
       }
      );
      }
    },
    showData:function(data)
    {
       BaseController.getdataAjax(data);
    },
    cancelDemo:function(){

      BaseController.alertDemo("Ban  co muon cancel");

    }
  }
 

