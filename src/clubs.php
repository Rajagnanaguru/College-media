<?php
session_start();
include_once "../backend/config.php";
$sql1 = mysqli_query($conn, "SELECT * FROM STUDENT WHERE UNAME = '{$_SESSION["Id"]}'");
$res = mysqli_fetch_assoc($sql1);
if (!isset($_SESSION['Id'])) {
    header("location: loginPage.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Project#01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../CSS/clubs.css">
    <script type="text/javascript" src="../assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="chat-ui container-fluid ">
        <div class="row">
            <!---------------------left-side chat ui friends list--------------------------------->


            <div class="clubs-list-ui col-sm-5 p-0 m-0">
                <div class="clubs-list-header p-0 sticky-top">
                    <div class="logo-header d-flex align-items-center p-0">
                        <a href="index.php" class="back-btn text-center text-white"><i class="fas fa-arrow-left fa-2x"></i></a>
                        <div class="logo"></div>
                        <div class="logout text-center">
                            <a href="../backend/logout.php?logout_id=<?php echo $res['UNAME']; ?>" class="btn logout-btn"><img src="../assets/bootstrap-icons-1.4.1/power.svg" class="py-1" /></a>
                        </div>
                    </div>
                    <!---------------------friends list search bar--------------------------------->

                    <div class="search-bar input-group p-3">
                        <input type="search" class="form-control" placeholder="Search clubs list...">
                        <span class="input-group-text"><img src="../assets/bootstrap-icons-1.4.1/search.svg"></span>
                    </div>

                    <!---------------------friends list search bar--------------------------------->

                </div>

                <div class="clubs-list">
                    <!---------------------friends list ui--------------------------------->
                    <div class="joined-clubs-list">
                    </div>

                    <!---------------------friends list ui--------------------------------->

                    <!---------------------other users list ui--------------------------------->

                    <div class="other-clubs-list">
                    </div>

                    <!---------------------other users list ui--------------------------------->

                </div>


            </div>

            <!---------------------left-side chat ui friends list--------------------------------->



            <!---------------------right-side chat ui--------------------------------->

            <div class="col-sm-7 chat-box p-0">
                <div class="initial-info d-flex justify-content-center align-items-center h-100">
                    <h1>Have a chat</h1>
                </div>
                <!---------------------text-box--------------------------------->

                <!---------------------text-box--------------------------------->
            </div>

            <!---------------------right-side chat ui--------------------------------->
        </div>
    </div>
    <script type="text/javascript" src="../JS/joined_clubs.js"></script>
    <script type="text/javascript" src="../JS/other_clubs.js"></script>
    <script type="text/javascript" src="../JS/group_chat.js"></script>
    <script type="text/javascript" src="../JS/join_club.js"></script>
    <script type="text/javascript" src="../JS/club_search.js"></script>
</body>

</html>