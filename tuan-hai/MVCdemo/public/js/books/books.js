$(document).ready(function(){
    $("#jsonpData").click(function(){
        $.ajax({
        	type:'get',
            url:'https://api.github.com/users/jeresig',
            dataType:'jsonp',
            jsonpCallback:'handleResponse',
            success:function(response){
                console.log(response);
            }
        });
    });
});
function handleResponse(response) {
    $('#results').text(response.data.login);
}

window.onload = function(){
    var http = new XMLHttpRequest();
    http.onreadystatechange = function(){
        if (http.readyState == 4 && http.status == 200) {
            console.log(JSON.parse( http.response));   
        }
    }
    http.open("GET","https://api.github.com/users/jeresig",true);
    http.send();
    $.get("https://api.github.com/users/jeresig",function(data){
        console.log(data);      
    });
    console.log('test');
    
}
