<?php
    session_start();
    include_once "config.php";
    $searchTerm = $_POST['searchTerm'];
    $sql = mysqli_query($conn,"SELECT * FROM STUDENT WHERE NOT UNAME = '{$_SESSION['Id']}' AND UNAME LIKE '%{$searchTerm}%'");
    $output = "";
    if(mysqli_num_rows($sql)){
        while($row = mysqli_fetch_assoc($sql)){
            $sql1 = mysqli_query($conn,"SELECT * FROM FRIEND_REQUEST WHERE REQUESTING_ID = '{$row['UNAME']}' OR ACCEPTING_ID = '{$row['UNAME']}'");
            $row1 = mysqli_fetch_assoc($sql1);
            if(mysqli_num_rows($sql1) && $row1['REQUESTING_ID'] == $row['UNAME'] && $row1['FRIENDS'] == 1)
            {
                $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-sm-2 text-center frnd-profile-pic">
                        <img src="../backend/Profile_pics/'.$row['IMAGE'].'" width="90%">
                    </span>
                    <span class="col-sm-4 info px-0">'.$row['UNAME'].'</span>
                    <div class="request col-sm-6 d-flex justify-content-end">
                        <button class="btn request-btn">Accept</button>
                        <button class="btn request-btn mx-2">Reject</button>
                    </div>
                </div>';
            }

            else if(mysqli_num_rows($sql1) && $row1['ACCEPTING_ID'] == $row['UNAME'] && $row1['FRIENDS'] == 1){
                $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-sm-2 text-center frnd-profile-pic">
                        <img src="../backend/Profile_pics/'.$row['IMAGE'].'" width="90%">
                    </span>
                    <span class="col-sm-4 info px-0">'.$row['UNAME'].'</span>
                    <div class="request col-sm-6 d-flex justify-content-end">
                        <button class="btn request-btn">Requested</button>
                    </div>
                </div>';
            }
            else if(mysqli_num_rows($sql1) && $row1['FRIENDS'] == 2){
                $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-sm-2 text-center frnd-profile-pic">
                    <img src="../backend/Profile_pics/'.$row['IMAGE'].'">
                    </span>
                    <span class="col-sm-10 info px-2">'.$row['UNAME'].'</span>
                </div>';
            }
            else{
                $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-sm-2 text-center frnd-profile-pic">
                        <img src="../backend/Profile_pics/'.$row['IMAGE'].'" width="90%">
                    </span>
                    <span class="col-sm-4 info px-0">'.$row['UNAME'].'</span>
                    <div class="request col-sm-6 d-flex justify-content-end">
                        <button class="btn request-btn">Request</button>
                    </div>
                </div>';    
            }
        }
    }
    else{
        $output = '<div class="frnd p-3">
        <span class="col-sm-12 info px-2">No uers found</span>
        </div>';
    }
    echo $output;
?>
