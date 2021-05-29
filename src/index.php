<?php
session_start();
include_once "../backend/config.php";
if (isset($_SESSION['Id'])) {
  $sql1 = mysqli_query($conn, "SELECT * FROM STUDENT WHERE UNAME = '{$_SESSION["Id"]}'");
  $res = mysqli_fetch_assoc($sql1);
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
  <link rel="stylesheet" href="../CSS/home.css">
  <script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="nav-w-slogan">
    <!-----------navbar section------------->
    <section id="navigation">
      <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="clubs.php">clubs</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Gallery
                </a>
                <div class="dropdown-menu" aria-labelledby="#navbarDropdown">
                  <a class="dropdown-item text-dark" href="kurukshetra.html">Kuruskshetra</a>
                  <a class="dropdown-item text-dark" href="Techofes.html">Techofes</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="myProfile.php">My Profile</a>
              </li>
              <?php
              if (isset($_SESSION['Id'])) {
                echo '<li class="nav-item">
                      <a href="../backend/logout.php?logout_id=' . $res['UNAME'] . '" class="btn logout-btn">Logout</a>
                    </li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </section>
    <!-----------navbar section------------->


    <!---------------Slogan----------------->
    <section class="slogan d-flex justify-content-center align-items-center">
      <div class="container-fluid">
        <div class="logo-name text-center">
          <p class="fill-text"><i class="fas fa-eye"></i>TERATORS</p>
        </div>
        <?php
        if (!isset($_SESSION['Id'])) {
          echo '<div class="log-sign-btns text-center"><a href="loginPage.php" class="btn login-btn bg-transaparent px-4 text-center">Login</a>
                  <a href="loginPage.php" class="btn signup-btn bg-transaparent px-4 mx-2 text-center">Signup</a></div>';
        } else {
          echo '<div class="chat-btn text-center"><a href="chat.php" class="btn bg-transaparent px-4 text-center">1-1 Chat</a>
                    <a href="club-chat.php" class="btn bg-transaparent px-4 text-center">Group Chat</a></div>';
        }
        ?>
      </div>
    </section>
    <!---------------Slogan----------------->
  </div>
  <!----------features-------->
  <div class="Cards">
    <!--------------Card-1------------------>

    <div class="card feature-1 my-5 m-auto">
      <div class="card-body text-center">
        <h1>F-1</h1>
        <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <button class="btn btn-warning  ">
          <a href=# class="text-uppercase text-white font-weight-bolder text-decoration-none">Find Friends</a>
        </button>
      </div>
    </div>

    <!--------------Card-1------------------>

    <!--------------Card-1------------------>

    <div class="card feature-1 my-5 m-auto">
      <div class="card-body text-center">
        <h1>F-1</h1>
        <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <button class="btn btn-warning  ">
          <a href=# class="text-uppercase text-white font-weight-bolder text-decoration-none">Find Friends</a>
        </button>
      </div>
    </div>

    <!--------------Card-1------------------>

    <!--------------Card-1------------------>

    <div class="card feature-1 my-5 m-auto">
      <div class="card-body text-center">
        <h1>F-1</h1>
        <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <button class="btn btn-warning  ">
          <a href=# class="text-uppercase text-white font-weight-bolder text-decoration-none">Find Friends</a>
        </button>
      </div>
    </div>

    <!--------------Card-1------------------>
  </div>

  <!--------footer------------>
  <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-instagram"></i>
        </a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-facebook-f"></i>
        </a>

        <!-- LinkedIn -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-linkedin-in"></i>
        </a>

      </section>
      <!-- Section: Social media -->

      <!-- Section: Text -->
      <section class="mb-4">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
          repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
          eum harum corrupti dicta, aliquam sequi voluptate quas.
        </p>
      </section>
      <!-- Section: Text -->
      
      <div class="copyright-text">
        <p>&copy; 2021</p>
      </div>
    </div>
    <!-- Grid container -->
  </footer>
  <!-- Footer -->
</body>

</html>