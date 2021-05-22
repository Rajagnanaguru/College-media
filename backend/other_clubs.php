<?php
session_start();
include_once "../backend/config.php";
$sql = mysqli_query($conn, "SELECT * FROM CLUBS WHERE NOT ADMIN_ID = '{$_SESSION["Id"]}'");
$sql1 = mysqli_query($conn, "SELECT * FROM CLUB_REQUEST WHERE CLUB_ID IN (SELECT CLUB_ID FROM CLUBS WHERE ADMIN_ID = '{$_SESSION["Id"]}')");

if (mysqli_num_rows($sql) > 0 || mysqli_num_rows($sql1) > 0) {
    $output = '<span class="text text-uppercase m-4">Others</span>';
    while ($row1 = mysqli_fetch_assoc($sql1)) {
        if ($row1['MEMBER'] == 1) {
            $output .= '
                    <div class="row frnd p-3 m-0 d-flex align-items-center">
                        <span class="col-sm-2 text-center frnd-profile-pic">
                            <img src="../assets/Images/login-logo.png" width="90%">
                        </span>
                        <span class="col-sm-4 info px-0">' . $row1['REQUESTING_ID'] . '</span>
                        <div class="request col-sm-6 d-flex justify-content-end">
                            <button class="btn request-btn">Accept</button>
                            <button class="btn request-btn mx-2">Reject</button>
                        </div>
                    </div>';
        }
    }
    while ($row = mysqli_fetch_assoc($sql)) {
        $sql2 = mysqli_query($conn, "SELECT * FROM CLUB_REQUEST WHERE REQUESTING_ID = '{$_SESSION["Id"]}' AND CLUB_ID = '{$row['CLUB_ID']}'");
        $row2 = mysqli_fetch_assoc($sql2);

        if (mysqli_num_rows($sql2) > 0 && $row2['MEMBER'] == 1) {
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-sm-2 text-center frnd-profile-pic">
                        <img src="../assets/Images/login-logo.png" width="90%">
                    </span>
            <span class="col-sm-4 info px-0">' . $row2['CLUB_ID'] . '</span>
                <div class="request col-sm-6 d-flex justify-content-end">
                    <button class="btn request-btn">Requested</button>
                </div>
            </div>';
        } 
        else if (mysqli_num_rows($sql2) > 0 && $row2['MEMBER'] == 2 ) {
            
        }
        else {
                $output .= '
            <div class="row frnd p-3 m-0 d-flex align-items-center">
                <span class="col-sm-2 text-center frnd-profile-pic">
                    <img src="../assets/Images/login-logo.png" width="90%">
                </span>
                    <span class="col-sm-4 info px-0">' . $row['CLUB_ID'] . '</span>
                    <div class="request col-sm-6 d-flex justify-content-end">
                        <button class="btn request-btn">Request</button>
                    </div>
                </div>';
        }
    }
}
if ($output === '<span class="text text-uppercase m-4">Others</span>') {
    $output = '<div class="frnd p-3">
        <span class="col-sm-12 info px-2" id="info">No new users available</span>
        </div>';
}
echo $output;
?>