$(document).ready(function() {

	$("#formlogin").validate({
		rules: {
			email:    "required",
			password: "required"
		},
		messages: {
			email:    "Hay dien day du email",
			password: "Hay dien day du password",
		}
	});
	$(".XoaUser").click(function() {
		var txt;
		//attr là thuộc tính 
		var target= $(this).attr('target');
		var name  = $(target).find('td'); //find lấy ra hàng thứ mấy 

		//console.log(name[3].innerText);
 		var r     = confirm(" Bạn có muốn xóa"+" "+name[1].innerText);
		if (  r   == true ) {
			var t = confirm(" Ban co chac muon xoa "+" "+name[1].innerText);
			if (t == true ) {
			  	 return true;
			}else{
			  	 return false;
			  }
		} else {	
		         return false;
		}

	});

});
