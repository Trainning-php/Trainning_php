function BaseController()
{
    this.alertDemo  = function($alert)
    {
   	    return  alert($alert);
    }
    this.getdataAjax = function(data)
    {
        $("#table_data").css("display","block");
        $("#data_name").text(data.name);
        $("#data_password").text(data.password);
        $("#data_email").text(data.email);
    }
  
}
var BaseController = new BaseController();