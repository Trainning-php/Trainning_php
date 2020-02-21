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

	$(".XoaUser").click(function(r) {
		var txt;
		var r = confirm("Bạn có muốn xóa ");
		if (r == true) {
		  txt = "You pressed OK!";
		} else {
		  txt = alert("Ban khong muon xoa");
		  return false;
		}

	});
});
