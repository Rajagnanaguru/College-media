$(document).ready(function(){
    var signup_form = document.getElementById("signup");
    const btn = $(".signup-form .submit-btn");
    const error_msg = $(".signup-form .error_msg");
    btn.click(function(){
        let xhr = new XMLHttpRequest();
        xhr.open("POST","../backend/signup.php",true);
        xhr.onload = () => {
            if(xhr.readyState == 4 && xhr.status == 200){
                let data = xhr.response;
                if(data === "success"){
                    location.href = "index.html";

            if(xhr.readystate == 4 && xhr.status == 200){
                let data = xhr.response;
                if(data === "success"){
                    location.href("index.html");
                }
                else{
                    error_msg.html(xhr.response);
                    error_msg.css("display","block");
                }
            }
                }
            }
        }
        let formData = new FormData(signup_form);
        xhr.send(formData);
    });
});
