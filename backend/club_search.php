<?php
session_start();
include_once "config.php";
$searchTerm = $_POST['searchTerm'];
$sql = mysqli_query($conn, "SELECT * FROM CLUBS WHERE CLUB_ID LIKE '%{$searchTerm}%'");
$output = "";
if (mysqli_num_rows($sql)) {
    while ($row = mysqli_fetch_assoc($sql)) {
        $sql1 = mysqli_query($conn, "SELECT * FROM CLUB_REQUEST WHERE REQUESTING_ID = '{$_SESSION["Id"]}' AND CLUB_ID = '{$row['CLUB_ID']}'");
        $row1 = mysqli_fetch_assoc($sql1);
        $sql2 = mysqli_query($conn, "SELECT * FROM CLUBS WHERE ADMIN_ID = '{$_SESSION["Id"]}' AND CLUB_ID = '{$row['CLUB_ID']}'");
        $row2 = mysqli_fetch_assoc($sql2);

        if (mysqli_num_rows($sql2) > 0 || (mysqli_num_rows($sql1) > 0 && $row1['MEMBER'] == 2)) {
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                <span class="col-sm-2 text-center frnd-profile-pic">
                <img src="../backend/Club_profile_pics/' . $row['PROFILE_IMAGE'] . '" width="90%">
                </span>
                <span class="col-sm-10 info px-2">' . $row['CLUB_ID'] . '</span>
                </div>';
        } else if (mysqli_num_rows($sql1) > 0 && $row1['MEMBER'] == 1) {
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-sm-2 text-center frnd-profile-pic">
                        <img src="../backend/Club_profile_pics/' . $row['PROFILE_IMAGE'] . '"width="90%">
                    </span>
                    <span class="col-sm-4 info px-0">' . $row['CLUB_ID'] . '</span>
                    <div class="request col-sm-6 d-flex justify-content-end">
                        <button class="btn request-btn">Requested</button>
                    </div>
                </div>';
        } else {
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-sm-2 text-center frnd-profile-pic">
                        <img src="../backend/Club_profile_pics/' . $row['PROFILE_IMAGE'] . '"width="90%">
                    </span>
                    <span class="col-sm-4 info px-0">' . $row['CLUB_ID'] . '</span>
                    <div class="request col-sm-6 d-flex justify-content-end">
                        <button class="btn request-btn">Request</button>
                    </div>
                </div>';
        }
    }
}
else{
    $output = '<div class="frnd p-3">
        <span class="col-sm-12 info px-2" id="info">No results found</span>
        </div>';
}
echo $output;
?>
