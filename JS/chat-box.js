
//displaying the friend name if clicked
$(document).ready(function(){
    $(".friends-list").on("click",".frnd",function(){
        var user_id = $(this).children(".info").text();
        const chat = $(".chat-box");
        var init_info = $(".initial-info");
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../backend/chat-box.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState == 4 && xhr.status){
                let data = xhr.response;
                    chat.html(data);
                    init_info.css("display","none");
            }
        }
        var dat = new FormData();
        dat.append('user_id',user_id);
        xhr.send(dat);
    });

//sending the user typed message to php
$(".chat-box").on('click',".text-bar .msg-send-icon",function(){
    var msg = $(".text-bar textarea");
    var receiver_id = $(".chat-box .sender-name .user_id").text();
    console.log(msg.val());
    if (msg.val().trim()!=' ' && msg.val().trim() != '') {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../backend/insert-msg.php", true);
        xhr.onload = () => {
            if (xhr.readyState == 4 && xhr.status) {
                let data = xhr.response;
                if (data === "success") {
                    msg.val("");
                }
            }
        }
        var dat = new FormData();
        dat.append('msg', msg.val());
        dat.append('receiver_id', receiver_id);
        xhr.send(dat);
    }
});

//getting the chats dynamically
setInterval(()=>{
    const chat = $(".chat-box").find(".chats");
    var receiver_id = $(".chat-box").find(".user_id").text();
    //console.log(receiver_id);
    let xhr = new XMLHttpRequest(); 
    xhr.open("POST", "../backend/display-msg.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == 4 && xhr.status){
            let data = xhr.response;
            chat.html(data);
        }
    }
    var dat = new FormData();
    dat.append('receiver_id',receiver_id);
    xhr.send(dat);
}, 200);

});