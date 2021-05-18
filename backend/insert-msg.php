<?php
    session_start();
    include_once "config.php";
    $msg = mysqli_real_escape_string($conn,$_POST['msg']);
    $receiver_id = mysqli_real_escape_string($conn,$_POST['receiver_id']);
    $sender_id = $_SESSION['Id'];

    if(isset($_SESSION['Id'])){
        //echo $receiver_id;
        $sql = mysqli_query($conn,"INSERT INTO CHAT(SENDER,RECEIVER,MESSAGE) VALUES('{$sender_id}','{$receiver_id}','{$msg}')");
            
        if($sql){
            echo "success";
        }
        else{
            echo mysqli_error($conn);
        }
    }
    else{
        header(location: "../src/loginPage.php");
    }
?>