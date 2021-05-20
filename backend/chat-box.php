<?php
    session_start();
    include_once "config.php";
    $user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $sql = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME = '{$user_id}'");
    $row = mysqli_fetch_assoc($sql);
    if(mysqli_num_rows($sql)>0){
    $output = '
            <div class="row chat-box-header align-items-center sticky-top m-0">
                <span class="col-sm-2 text-center profile-img px-1">
                    <img src="../assets/Images/profile_pic.jpg"> 
                </span>
                <div class="col-sm-8 sender-name text-white px-0">
                    <div class="user_id">'.$user_id.'</div>
                    <div class="online-status">'.$row['STATUS'].'</div>
                </div>
                <div class="col-sm-2 text-center unfollow-btn">
                    <button class="btn">Unfollow</button>
                </div>
            </div>
            <div class="chats">
            </div>
            <div class="d-flex text-bar">
                <textarea class="p-2" placeholder="type something here..."></textarea>
                <div class="d-flex align-items-center justify-content-center camera-icon"><i class="fa fa-camera"></i></div>
                <div class="d-flex align-items-center justify-content-center msg-send-icon"><i class="fa fa-paper-plane"></i></div>
            </div>';
    echo $output;
    }
    else{
        echo mysqli_error($conn);
    }
?>