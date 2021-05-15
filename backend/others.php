<?php
    session_start();
    include_once "../backend/config.php";
    $sql = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME NOT IN  (SELECT FRIEND_ID FROM FRIENDS WHERE STUDENT_ID = '{$_SESSION["Id"]}') AND NOT UNAME = '{$_SESSION["Id"]}'");
    if(mysqli_num_rows($sql)>0){
        $output = '<span class="text m-2">Others</span>';
        while($row = mysqli_fetch_assoc($sql)){
            $sql1 = mysqli_query($conn,"SELECT * FROM FRIEND_REQUEST WHERE REQUESTING_ID = '{$row['UNAME']}' AND ACCEPTING_ID = '{$_SESSION["Id"]}'");
            $sql2 = mysqli_query($conn,"SELECT * FROM FRIEND_REQUEST WHERE REQUESTING_ID = '{$_SESSION["Id"]}' AND ACCEPTING_ID = '{$row['UNAME']}'");
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-sm-2 text-center frnd-profile-pic">
                        <img src="../assets/Images/login-logo.png" width="90%">
                    </span>';
            if(mysqli_num_rows($sql1)>0){
            $output .= '<span class="col-sm-5 info px-0">'.$row['UNAME'].'</span>
                    <div class="request col-sm-5 text-center">
                        <button class="btn request-btn">Accept</button>
                        <button class="btn request-btn">Reject</button>
                    </div>
                </div>';
            }
            else if(mysqli_num_rows($sql2)>0){
                $output .= '<span class="col-sm-7 info px-0">'.$row['UNAME'].'</span>
                <div class="request col-sm-3">
                    <button class="btn request-btn">Requested</button>
                </div>
            </div>'; 
            }
            else{
                $output .= '<span class="col-sm-7 info px-0">'.$row['UNAME'].'</span>
                    <div class="request col-sm-3">
                        <button class="btn request-btn">Request </button>
                    </div>
                </div>';
            }
        }
    }
    else{
        $output = '<div class="frnd p-3">
        <span class="col-sm-12 info px-2" id="info">No new users available</span>
        </div>';
    }
    echo $output;
?>