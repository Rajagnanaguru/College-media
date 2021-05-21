<?php
   session_start();
   include_once "../backend/config.php";
   if(isset($_SESSION['Id'])){
    $sql1 = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME = '{$_SESSION["Id"]}'");
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
        <script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js"crossorigin="anonymous"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"crossorigin="anonymous"></script>       
    </head>
    <body>
      <div class="nav-w-slogan">
      <!-----------navbar section------------->
        <section id="navigation">
          <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">CHAT</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">clubs</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Events
                    </a>
                    <div class="dropdown-menu" aria-labelledby="#navbarDropdown">
                      <a class="dropdown-item text-dark" href="#">Kuruskshetra</a>
                      <a class="dropdown-item text-dark" href="#">Techofes</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">My Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About us</a>
                  </li>
                  <?php
                    if(isset($_SESSION['Id'])){
                      echo '<li class="nav-item">
                      <a href="../backend/logout.php?logout_id='.$res['UNAME'].'" class="btn logout-btn">Logout</a>
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
                <h1>CONNECT-G</h1>
              </div>
              <?php
                  if(!isset($_SESSION['Id'])){
                  echo '<div class="log-sign-btns text-center"><a href="loginPage.php" class="btn login-btn bg-transaparent text-dark px-4 text-center">Login</a>
                  <a href="loginPage.php" class="btn signup-btn bg-transaparent text-dark px-4 mx-2 text-center">Signup</a></div>';
                  }
                  else{
                    echo '<div class="log-sign-btns text-center"><a href="chat.php" class="btn login-btn bg-transaparent text-dark px-4 text-center">Chat</a></div>';
                  }
                ?>
          </div>
        </section>
        <!---------------Slogan----------------->
      </div>
        <!----------features-------->
        <section id="Cards" class="p-0">
          <!--------------Card-1------------------>
          <div class="row">
            <div class="card feature-1 col-md-4 mt-5 mb-5 m-auto">     
              <div class="card-body text-center">
                <h1 >F-1</h1>
                <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 
                <button class="btn btn-warning  ">
                  <a href=# class="text-uppercase text-white font-weight-bolder text-decoration-none">Find Friends</a>
                </button>
              </div>
              <div class="overlay">
                <h1 class="text-center text-white">F-1</h1>
              </div>
            </div>
          </div>
          <!--------------Card-1------------------>

          <!--------------Card-2------------------>
          <div class="row">
            <div class="card feature-2 col-md-4 mt-5 mb-5 m-auto">     
              <div class="card-body text-center">
                <h1 >F-2</h1>
                <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 
                <button class="btn btn-warning  ">
                  <a href=# class="text-uppercase text-white font-weight-bolder text-decoration-none">Find Friends</a>
                </button>
              </div>
              <div class="overlay">
                <h1 class="text-center text-white">F-2</h1>
              </div>
            </div>
          </div>
          <!--------------Card-2------------------>

          
          <!--------------Card-3------------------>
          <div class="row">
            <div class="card feature-3 col-md-4 mt-5 mb-5 m-auto">     
              <div class="card-body text-center">
                <h1 >F-3</h1>
                <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> 
                <button class="btn btn-warning  ">
                  <a href=# class="text-uppercase text-white font-weight-bolder text-decoration-none">Find Friends</a>
                </button>
              </div>
              <div class="overlay">
                <h1 class="text-center text-white">F-3</h1>
              </div>
            </div>
          </div>
          <!--------------Card-3------------------>
        </section>
         <!----------features-------->

        <!--------footer------------>
        <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1 bg-white" href="#!" role="button">
              <img src="../assets/bootstrap-icons-1.4.1/facebook.svg">
            </a>
            
            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1 bg-white" href="#!" role="button">
              <img src="../assets/bootstrap-icons-1.4.1/instagram.svg">
            </a>

            <!-- LinkedIn -->
            <a class="btn btn-outline-light btn-floating m-1 bg-white" href="#!" role="button">
              <img src="../assets/bootstrap-icons-1.4.1/linkedin.svg">
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

          <!-- Section: Links -->
          <section class="">
            <!--Grid row-->
            <div class="row">
              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#!" class="text-white">Link 1</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 2</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 3</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 4</a>
                  </li>
                </ul>
              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#!" class="text-white">Link 1</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 2</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 3</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 4</a>
                  </li>
                </ul>
              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#!" class="text-white">Link 1</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 2</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 3</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Link 4</a>
                  </li>
                </ul>
              </div>
              <!--Grid column-->
            </div>
            <!--Grid row-->
          </section>
          <!-- Section: Links -->
        </div>
        <!-- Grid container -->
      </footer>
      <!-- Footer -->
    </body>
</html>