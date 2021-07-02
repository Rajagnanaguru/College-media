<?php
    session_start();
    include_once "config.php";
    $club_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $sql = mysqli_query($conn,"SELECT * FROM CLUB_REQUEST WHERE CLUB_ID = '{$club_id}' AND REQUESTING_ID = '{$_SESSION['Id']}' AND MEMBER = 2");
    $sql1 = mysqli_query($conn,"SELECT * FROM CLUBS WHERE CLUB_ID = '{$club_id}'");
    $row1 = mysqli_fetch_assoc($sql1);


    if(mysqli_num_rows($sql)>0 || (mysqli_num_rows($sql1)>0 && $row1['ADMIN_ID'] == $_SESSION['Id'])){
    $output = '
            <div class="row chat-box-header align-items-center sticky-top m-0">
                <span class="col-sm-2 text-center profile-img px-1">
                    <img src="../backend/Club_profile_pics/'.$row1['PROFILE_IMAGE'].'"> 
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
            </div>
            <div class="group-info p-0 m-0">
                
            </div>';
    }
    else{
        $output = '
                    <div class="initial-info d-flex justify-content-center align-items-center h-100">
                        <h1>NOT JOINED YET</h1>
                    </div>';
    }
    echo $output;
?>