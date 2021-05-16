<?php 
  session_start();
  include_once "../backend/config.php";
  if(!isset($_SESSION['Id'])){
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
        <link rel="stylesheet" href="../CSS/chat.css">
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"crossorigin="anonymous"></script>
        <script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js"crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="chat-ui container-fluid ">
            <div class="row">
                <!---------------------left-side chat ui friends list--------------------------------->


                <div class="friends-list-ui col-sm-5 p-0">
                        <div class="friends-list-header p-0 sticky-top">
                            <div class="logo-header d-flex">
                                <span class="text-white col-sm-10">
                                <?php 
                                    $sql1 = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME = '{$_SESSION["Id"]}'");
                                    $res = mysqli_fetch_assoc($sql1);
                                    $uname = $res['UNAME'];
                                    $status = $res['STATUS'];
                                    echo "$uname"." "."$status";
                                ?>
                                </span>
                                <div class="logout col-sm-2">
                                    <a href="../backend/logout.php?logout_id=<?php echo $res['UNAME']; ?>" class="btn logout-btn">Logout</a>
                                </div>
                            </div>
                            <!---------------------friends list search bar--------------------------------->

                            <div class="search-bar input-group p-3">
                                <input type="search" class="form-control" placeholder="Search your friends list...">
                                <span class=input-group-text><img src="../assets/bootstrap-icons-1.4.1/search.svg"></span>
                            </div>

                            <!---------------------friends list search bar--------------------------------->

                        </div>
                        <!---------------------friends list ui--------------------------------->
                        
                        <div class="friends-list">
                        </div>

                        <!---------------------friends list ui--------------------------------->

                        <!---------------------other users list ui--------------------------------->     

                        <div class="other-users-list">
                        </div>          

                        <!---------------------other users list ui--------------------------------->          

                </div>

                <!---------------------left-side chat ui friends list--------------------------------->



                <!---------------------right-side chat ui--------------------------------->

                <div class="col-sm-7 chat-box p-0">
                        <div class="chat-box-header sticky-top m-0">
                            <span class="profile-img p-3">
                                <img src="../assets/Images/profile_pic.jpg"> 
                            </span>
                            <span class="sender-name text-white p-1">Godwin</span>
                        </div>
                        <div class="chats">
                            <div class="outgoing-msg d-flex">
                                <span class="msg-text">Hello</span>
                            </div>
                            <div class="incoming-msg d-flex">
                                <span class="msg-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus ut sapiente a consectetur, iusto doloribus possimus nostrum deserunt iste dicta saepe nihil repellat! Magnam hic porro neque asperiores sequi quisquam.</span>
                            </div>
                            
                        </div>
                        <!---------------------text-box--------------------------------->

                        <div class="text-bar input-group">
                            <input type="text" class="form-control p-2" placeholder="type something here...">
                            <span class=input-group-text><i class="fa fa-paper-plane"></i></span>
                        </div>

                        <!---------------------text-box--------------------------------->
                </div>

                <!---------------------right-side chat ui--------------------------------->
            </div>
        </div>
        <script type="text/javascript" src="../JS/friends.js"></script>
        <script type="text/javascript" src="../JS/others.js"></script>
        <script type="text/javascript" src="../JS/make_friends.js"></script>
    </body>
</html>