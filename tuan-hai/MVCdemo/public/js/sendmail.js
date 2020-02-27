$(document).ready(function(){

  $( "#form_sendmail" ).on( "submit", function( event ) {
  event.preventDefault();
  var form_Data = $(this).serialize();
  $.ajax({
  	type     : "POST",
  	url      : "index.php?&controller=PDOhome&action=sendmail",
  	dataType : "json",
  	data     : form_Data,

  	}).done(function(data){
  	  console.log(data);
  	  alert("it's oki");
  	}).fail(function(data){
  	   
  	});
  });

});