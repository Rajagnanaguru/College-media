$(document).ready(function(){
    const friends_list = $(".friends-list"); 
    //var info = $(".other-users-list .frnd .info");

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../backend/friends.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState == 4 && xhr.status){
            let data = xhr.response;
            //console.log(info.text());
            //if(info == "No new users available"){
              //friends_list.css("display","none");
            //}
            //else{
              friends_list.html(data);
            //}
          }
      }
    xhr.send();
  }, 200);

});