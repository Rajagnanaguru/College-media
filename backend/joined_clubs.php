<?php
    session_start();
    include_once "../backend/config.php";
    $sql1 = mysqli_query($conn,"SELECT * FROM CLUB_REQUEST WHERE REQUESTING_ID = '{$_SESSION["Id"]}' AND MEMBER = 2");
    $sql2 = mysqli_query($conn,"SELECT * FROM CLUBS WHERE ADMIN_ID = '{$_SESSION["Id"]}'");
    $output = '<span class="text text-uppercase m-4">Joined clubs</span>';

    if(mysqli_num_rows($sql1)>0 || mysqli_num_rows($sql2)>0){
        while($row1 = mysqli_fetch_assoc($sql1)){
            $sql3 = mysqli_query($conn,"SELECT * FROM CLUBS WHERE CLUB_ID = '{$row1['CLUB_ID']}'");
            $row3 = mysqli_fetch_assoc($sql3);
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                <span class="col-sm-2 text-center frnd-profile-pic">
                <img src="../assets/Images/'.$row3['PROFILE_IMAGE'].'" width="90%">
                </span>
                <span class="col-sm-10 info px-2">'.$row1['CLUB_ID'].'</span>
                </div>';
        }
        while($row2 = mysqli_fetch_assoc($sql2)){
            $sql3 = mysqli_query($conn,"SELECT * FROM CLUBS WHERE CLUB_ID = '{$row2['CLUB_ID']}'");
            $row3 = mysqli_fetch_assoc($sql3);
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                <span class="col-sm-2 text-center frnd-profile-pic">
                <img src="../assets/Images/'.$row3['PROFILE_IMAGE'].'" width="90%">
                </span>
                <span class="col-sm-10 info px-2">'.$row2['CLUB_ID'].'</span>
                </div>'; 
        }
    }
    else{
        $output = '<div class="frnd p-3">
        <span class="col-sm-12 info px-2">You didnt join any clubs yet</span>
        </div>';
    }
    echo $output;
?>