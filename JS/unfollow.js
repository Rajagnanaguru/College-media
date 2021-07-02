$(document).ready(function(){
    $(".chat-box").on("click",".unfollow-btn .btn",function(){
        var btnValue = $(this).text();
        var user_id = $(this).parents(".chat-box-header").children(".sender-name").children(".user_id").text();
        const chat = $(".chat-box");

        let xhr = new XMLHttpRequest();
        xhr.open("POST","../backend/unfollow.php",true);
        xhr.onload = () =>{
            if(xhr.readyState == 4 && xhr.status == 200){
                let data = xhr.response;
                console.log(data);
                chat.html(data);
            }
        }
        var Data = new FormData();
        Data.append("btnValue",btnValue);
        Data.append("user_id",user_id);
        xhr.send(Data);
    });
});