<?php
    session_start();
    include_once "config.php";
    $club_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $sql = mysqli_query($conn,"SELECT * FROM CLUBS WHERE CLUB_ID = '{$club_id}'");
    $row = mysqli_fetch_assoc($sql);
    if(mysqli_num_rows($sql)>0){
    $output = '
            <div class="row chat-box-header align-items-center sticky-top m-0">
                <span class="col-sm-2 text-center profile-img px-1">
                    <img src="../backend/Club_profile_pics'.$row['PROFILE_IMAGE'].'"> 
                </span>
                <div class="col-sm-8 sender-name text-white px-0">
                    <div class="user_id">'.$club_id.'</div>
                    <div class="online-status"></div>
                </div>
                <div class="col-sm-2 text-center unfollow-btn">
                    <button class="btn">Leave</button>
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