$(document).ready(function(){    
    //const btn = $(".other-users-list .request-btn");
    $('.other-users-list').on('click',".request-btn",function(){
        var uname = $(this).parents(".frnd").children(".info").text();
        var btnValue  = $(this).text();
        console.log(btnValue);
        let xhr = new XMLHttpRequest();
        //sending the username of the id which the current user requested
        xhr.open("POST","../backend/make_friends.php?uname="+uname+"&btnValue="+btnValue,true);
        xhr.onload = () =>{
            let data = xhr.response;
            console.log(data);
        } 
       // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send();
    });
});