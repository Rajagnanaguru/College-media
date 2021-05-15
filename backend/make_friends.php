<?php
    session_start();
    include_once "../backend/config.php";
    //getiing the user id of which the current user requested
    $friend_id = mysqli_real_escape_string($conn,$_GET['uname']);
    $btnValue = mysqli_real_escape_string($conn,$_GET['btnValue']);

    if($btnValue == "Request"){
        //$is_friends = 'no';
        $sql1 = mysqli_query($conn,"INSERT INTO FRIEND_REQUEST(ACCEPTING_ID,REQUESTING_ID) VALUES('{$friend_id}','{$_SESSION['Id']}')");
        if($sql1){
            echo "Requested";
        }
        else{
            echo mysqli_error($conn);
        }
    }
    else if($btnValue = "Reject"){
        
    }
    else{
        $sql2 = mysqli_query($conn,"UPDATE FRIEND_REQUEST SET IS_FRIENDS = 'yes' WHERE REQUESTING_ID = '{$friend_id}' AND ACCEPTING_ID = '{$_SESSION['Id']}'");
        $sql3 = mysqli_query($conn,"INSERT INTO FRIENDS(STUDENT_ID,FRIEND_ID) VALUES('{$friend_id}','{$_SESSION['Id']}')");
        $sql4 = mysqli_query($conn,"INSERT INTO FRIENDS(STUDENT_ID,FRIEND_ID) VALUES('{$_SESSION['Id']}','{$friend_id}')");
        if($sql2)
            echo "Accepted";
        else{
            echo mysqli_error($conn);
        }
    }
?>