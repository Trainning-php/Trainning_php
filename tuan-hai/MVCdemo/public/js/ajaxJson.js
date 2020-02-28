$(document).ready(function(){
	$('#searchJs').click(function(){
      var id = $("#list_data").val();
	    if (id == '') {
      	alert("Please select data");
      	//$("#table_data").css("display","none");
      }else {
      	$.ajax(
      	  {
      	  	url: "index.php?&controller=PDOhome&action=searchJS",
      	  	method:"POST",
      	  	dataType:"JSON",
      	  	data:{id:id},
      	  	success:function(data){
      	  	  $("#table_data").css("display","block");
      	  	  $("#data_name").text(data.name);
      	  	  $("#data_password").text(data.password);
      	  	  $("#data_email").text(data.email);
      	  	}
      	  }
      	);
      }
	});
});