<?php
    session_start();
    include_once "../backend/config.php";
    $sql = mysqli_query($conn,"SELECT * FROM FRIEND_REQUEST WHERE ACCEPTING_ID = '{$_SESSION["Id"]}' AND FRIENDS = 2");
    $sql1 = mysqli_query($conn,"SELECT * FROM FRIEND_REQUEST WHERE REQUESTING_ID = '{$_SESSION["Id"]}' AND FRIENDS = 2");
    if(!$sql)
        echo mysqli_error($conn);
    if(mysqli_num_rows($sql)>0 || mysqli_num_rows($sql1)>0){
        $output = '<span class="text m-2">Friends</span>';
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                <span class="col-sm-2 text-center frnd-profile-pic">
                <img src="../assets/Images/login-logo.png" width="90%">
                </span>
                <span class="col-sm-10 info px-2">'.$row['REQUESTING_ID'].'</span>
                </div>';
        }
        
        while($row = mysqli_fetch_assoc($sql1)){
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                <span class="col-sm-2 text-center frnd-profile-pic">
                <img src="../assets/Images/login-logo.png" width="90%">
                </span>
                <span class="col-sm-10 info px-2">'.$row['ACCEPTING_ID'].'</span> 
                </div>';
        }
    }
    
    else{
        $output = '<div class="frnd p-3">
        <span class="col-sm-12 info px-2">You have no friends in your list</span>
        </div>';
    }
    echo $output;
?>