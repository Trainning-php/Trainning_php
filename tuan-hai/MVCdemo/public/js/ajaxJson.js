$(document).ready(function(){
  $('#searchJs').click(function(){
    var id = $("#list_data").val();
    if (id == '') {
        alert("Please select data");
        $("#table_data").css("display","none");
    }else{
        $.ajax(
        {
            url: "index.php?&Controller=PDOhome&action=searchJS",
            method:"POST",
            dataType:"JSON",
            data:{ id : id },
            success:function(data){
                console.log(data);
                $("#table_data").css("display","block");
                if (data.name == null ) {
                    $("#data_name").css("display","none");
                }else{
                    $("#data_name").text(data.name);
                }
                $("#data_password").text(data.password);
                $("#data_email").text(data.email);
           }
        });
      }
  });
    $('#datepicker').click(function(){
        $( function() {
            $( "#datepicker" ).datepicker({dateFormat:'dd/mm/yy'});
        });
    });
    
    
});
