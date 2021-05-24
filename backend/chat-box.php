<?php
session_start();
include_once "config.php";
 $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
//$sql = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME = '{$user_id}'");
//$row = mysqli_fetch_assoc($sql);
$sql1 = mysqli_query($conn, "SELECT * FROM FRIEND_REQUEST WHERE (REQUESTING_ID = '{$user_id}' AND ACCEPTING_ID = '{$_SESSION['Id']}')
    OR (REQUESTING_ID = '{$_SESSION['Id']}' AND ACCEPTING_ID = '{$user_id}')");
$row1 = mysqli_fetch_assoc($sql1);
$output = "";
if (mysqli_num_rows($sql1) > 0) {
    if ($row1['FRIENDS'] == 2) {
        $sql = mysqli_query($conn, "SELECT * FROM STUDENT WHERE UNAME = '{$user_id}'");
        $row = mysqli_fetch_assoc($sql);
        $output .= '
            <div class="row chat-box-header align-items-center sticky-top m-0">
                <span class="col-sm-2 text-center profile-img px-1">
                    <img src="../backend/Profile_pics/' . $row['IMAGE'] . '"> 
                </span>
                <div class="col-sm-8 sender-name text-white px-0">
                    <div class="user_id">' . $user_id . '</div>
                    <div class="online-status"></div>
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
    } else {
        $output .= '<div class="follow-info d-flex justify-content-center align-items-center h-100">
            <h1>NOT FOLLOWING YET</h1>
        </div>';
    }
} else {
    $output .= '<div class="follow-info d-flex justify-content-center align-items-center h-100">
        <h1>NOT FOLLOWING YET</h1>
    </div>';
}
echo $output;
