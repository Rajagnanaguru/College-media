<?php
    session_start();
    include_once "config.php";
    $user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    
    $output = '
            <div class="row chat-box-header align-items-center sticky-top m-0">
                <span class="col-sm-1 text-center profile-img px-3">
                    <img src="../assets/Images/profile_pic.jpg"> 
                </span>
                <span class="col-sm-9 sender-name text-white px-4">'.$user_id.'</span>
                <div class="col-sm-2 text-center unfollow-btn">
                    <button class="btn">Unfollow</button>
                </div>
            </div>
            <div class="chats">
            </div>
            <div class="text-bar input-group">
                <input type="text" class="form-control p-2" placeholder="type something here...">
                <span class="input-group-text"><i class="fa fa-paper-plane"></i></span>
            </div>';
    echo $output;
?>