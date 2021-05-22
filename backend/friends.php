<?php
    session_start();
    include_once "../backend/config.php";
    $sql = mysqli_query($conn,"SELECT * FROM FRIEND_REQUEST WHERE (ACCEPTING_ID = '{$_SESSION["Id"]}' OR  REQUESTING_ID = '{$_SESSION["Id"]}') AND FRIENDS = 2");
  
    if(mysqli_num_rows($sql)){
        $output = '<span class="text text-uppercase m-4">Friends</span>';
        while($row = mysqli_fetch_assoc($sql)){
            if($row['ACCEPTING_ID'] == $_SESSION["Id"]){
                $sql1 = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME = '{$row['REQUESTING_ID']}'");
                $row1 = mysqli_fetch_assoc($sql1);
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-sm-2 text-center frnd-profile-pic">
                    <img src="../backend/Profile_pics/'.$row1['IMAGE'].'">
                    </span>
                    <span class="col-sm-10 info px-2">'.$row['REQUESTING_ID'].'</span>
                </div>';
            }
            else{
                $sql1 = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME = '{$row['ACCEPTING_ID']}'");
                $row1 = mysqli_fetch_assoc($sql1);
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-sm-2 text-center frnd-profile-pic">
                        <img src="../backend/Profile_pics/'.$row1['IMAGE'].'">
                    </span>
                    <span class="col-sm-10 info px-2">'.$row['ACCEPTING_ID'].'</span> 
                </div>';
            }
        }
    }
    
    else{
        $output = '<div class="frnd p-3">
        <span class="col-sm-12 info px-2">You have no friends in your list</span>
        </div>';
    }
    echo $output;
?>