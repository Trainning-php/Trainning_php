$(document).ready(function(){
  $("#sendMail").click(function(){
    $("#form_sendmail").submit(function(e){
     e.preventDefault();
     var form_data = $(this).serialize();
     var url       = "index.php?&controller=PDOhome&action=sendMail";
     $.ajax({
       type:"POST",
       url:url,
       dataType:"JSON",
       data:form_data,
     
     })
     .done(function(data){
        console.log(data);
        alert("it's ok");
       }).fail(function(data){
        console.log(data);
       });
    });
  })
});