<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/flaticon.css">
  <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  include 'admin/functions.php';
   global $conn;
  SESSION_START();

  ?>
</head>

<body>
  <header class="header-section">
    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-8 col-md-7">
            <ul class="header-company-contact">
              <li><i class="fa fa-phone"></i>01 245 845 4225</li>
              <li><i class="fa fa-envelope"></i> info@yoursitename.com</li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-5">
            <ul class="header-user-login-regis">
			<?php if($_SESSION["username"]) { ?>
              <li><a href="login.php">Welcome Back, <?php  echo $_SESSION["username"];  ?></a></li>
			  <li><a href="logout.php" >LogOut</li>
			<?php } else { ?>
              <li><a href="login.php">Log in</a></li>
			  
              <li><a href="create-account.php">Register</a></li>
			<?php } ?>
              <li>
			  
                <div class="header-select-list">
                  <select>
                    <option value="english">English</option>
                    <option value="bangla">Bangla</option>
                    <option value="arabic">Arabic</option>
                    <option value="spanish">Spanish</option>
                  </select>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div><!-- header-top end -->
    <div class="header-bottom">
      <div class="container">
          <nav class="navbar navbar-expand-lg">
            <a class="site-logo site-title" href="#"><img src="images/logo1.png" alt="site-logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="menu-toggle"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav main-menu ml-auto">
                <li><a href="index.php">Home</a> </li>
                <li class="menu_has_children"><a href="about.php">About</a>
                  <ul class="sub-menu">
                    <li><a href="our-advisors.php">Advisors</a></li>                 
                  
                    <li><a href="faq.php">FAQ</a></li>
                   
                    <li><a href="gallery.php">Gallery</a></li>
                   
                  </ul>
                </li>
                </li>
                <li><a href="courses.php">Courses</a></li>
                <li>
                    <a href="blog-grid.php">Blog grid</a></li>
                    <li><a href="contact.php">Contact</a></li>
               
              
              
              </ul>
            </div>
          </nav>
      </div>
    </div><!-- header-bottom end -->
  </header>