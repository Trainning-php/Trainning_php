$(document).ready(function(){
    $("#jsonpData").click(function(){
        $.ajax({
        	type:'get',
            url:'https://api.github.com/users/jeresig',
            dataType:'jsonp',
            jsonpCallback:'handleResponse',
            // success:function(){
            // 	alert('thanh cong');
            // }
        });
    });
});
    function handleResponse(response) {
        $('#results').text(response.data.login);
        console.log(response.data);
    }
