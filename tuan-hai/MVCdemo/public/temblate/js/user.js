var user = {
    ERROR_MESSAGE: "loi tum lum khó chịu (@.@)",
    isClickOk:false,
    showUser: function() {
        var id     = $("#list_data").val();
        var params = {id: !id ? "" :id}
        console.log(id);
        if (id == '') {
            alert("write someting! ");
        }else{
            $.ajax(
            { 
                url:"index.php?&Controller=PDOhome&action=demoAjax",
                method:"POST",
                dataType:"JSON",
                data:params,
                success:function(data){
                    user.showData(data);
                }
            });
        }
    },
    showData:function(data)
    {
        BaseController.getdataAjax(data);
    },
    cancelDemo:function(){

        BaseController.alertDemo("Ban  co muon cancel");
    },
    showOverlay:function(id){
        alert("click showOverlay");
    }
}
 

