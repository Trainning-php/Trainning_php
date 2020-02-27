var user = {
  ERROR_MESSAGE: "loi tum lum khó chịu (@.@)",
  showOverlay: function() {
    $.ajax(
       {
         success:function(){
          BaseController.alertDemo(user.ERROR_MESSAGE);
         }
       }
      );
    }
  }

