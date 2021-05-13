
function signup_toggle(){
    document.getElementById("panel-left").style["transform"]="translateX(0%)";
    document.getElementById("panel-right").style["transform"]="translateX(200%)";
    document.getElementById("signup-form").style["transform"]="translateX(0%)";
    document.getElementById("login-form").style["transform"]="translateX(-200%)";
}

function login_toggle(){
    document.getElementById("panel-right").style["transform"]="translateX(100%)";
    document.getElementById("panel-left").style["transform"]="translateX(-100%)";
    document.getElementById("login-form").style["transform"]="translateX(0%)";
    document.getElementById("signup-form").style["transform"]="translateX(200%)";
}