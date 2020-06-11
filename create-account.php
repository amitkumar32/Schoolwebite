<?php
include 'header.php';

?>


   
  <section class="single-banner course-grid-banner">
      <div class="banner-content-area">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <div class="banner-content text-center">
                <h1 class="banner-title">Create an Account</h1>
              </div>
              <div class="page-breadcums">
                <div class="container">
                  <ul class="page-list">
                    <li><a href="home-one.html">Home</a></li>
                    <li>create acount</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <section class="create-account-section section-padding section-bg">
        <div class="container">
          <div class="create-account-wrapper">
		  	<?php 
			//p($studentData);
			// send data in database
			if(isset ($_POST["submit"])){				
				$result = addupdateRegister($_POST); //function name in functions.php
				if($result['status'] == 0){
					$reponseMsg = $result['message'];
				}else{
					$reponseMsg = $result['message'];
				 }			
			}
			// end here
			?>
            <div class="row">
              <div class="col-md-6 create-account-left">
                <a class="video-bnt" href="#"><i class="fa fa-play"></i></a>
              </div>
              <div class="col-md-6">
                <div class="create-account-form-area form-area">
                  <h4 class="form-title">Create Account</h4>
                  <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below</p>
                  <form class="join-form form-style-one" method="post">
                    <div class="frm-group">
                      <i class="fa fa-user"></i>
                      <input type="text" name="first_name"  placeholder="First Name">
                    </div>
					<div class="frm-group">
                      <i class="fa fa-user"></i>
                      <input type="text" name="last_name"  placeholder="Last Name">
                    </div>
                    <div class="frm-group">
                      <i class="fa fa-envelope"></i>
                      <input type="email" name="email"  placeholder="Email">
                    </div>
                    <div class="frm-group">
                      <i class="fa fa-phone"></i>
                      <input type="tel" name="phone"  placeholder="Phone Number">
                    </div>
					 <div class="frm-group">
                      <i class="fa fa-phone"></i>
                      <input type="tel" name="course"  placeholder="Course Name">
                    </div>
                    <div class="frm-group">
                        <i class="fa fa-globe"></i>
                        <input type="password" name="password"  placeholder="Type password">
                      </div>
                    <div class="frm-group text-center">
                      <button type="submit" name="submit" class="apply-btn">create Account</button>
                      <a href="login.php" class="account-log-btn">login to acount</a>
                    </div>
                  </form>
                </div><!-- create-account-form-area end -->
              </div>
            </div>
          </div>
        </div>
      </section>

      

      
        
            <div class="container">
              <div class="row justify-content-between">
                <div class="col-lg-5 col-md-6">
                  <div class="widget company-widget">
                    <a href="#" class="site-logo"><img src="images/logo.png" alt="logo"></a>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s</p>
                  </div>
                  <div class="widget subscribe-widget">
                    <h5 class="widget-title">subscribe us</h5>
                    <div class="subscribe-form-area">
                      <form class="subscribe-form">
                        <input type="email" id="subs-email" placeholder="Your email address">
                        <button type="submit" class="subscribe-btn"><i class="fa fa-paper-plane"></i></button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="widget quick-links-widget">
                    <h5 class="widget-title">Quick Links</h5>
                    <div class="short-links-list">
                      <ul class="widget-links-list">
                        <li><a href="home.html"><i class="fa fa-angle-right"></i>Home</a></li>
                        <li><a href="about.html"><i class="fa fa-angle-right"></i>About Us</a></li>
                        <li><a href="gallery.html"><i class="fa fa-angle-right"></i>Gallery</a></li>
                        <li><a href="our-advisors.html"><i class="fa fa-angle-right"></i>Advisor</a></li>
                        
                      </ul>
                      <ul class="widget-links-list">
                          <li><a href="event.html"><i class="fa fa-angle-right"></i>Events</a></li>
                          <li><a href="courses.html"><i class="fa fa-angle-right"></i>Courses</a></li>
                        <li><a href="blog-grid.html"><i class="fa fa-angle-right"></i>Blog</a></li>
                        <li><a href="contact.html"><i class="fa fa-angle-right"></i>Contact Us</a></li>
                       
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="widget hot-links-widget">
                    <h5 class="widget-title">contact us</h5>
                    <ul class="company-address-list">
                      <li><i class="fa fa-envelope"></i><p>example@mail.com</p></li>
                      <li><i class="fa fa-phone"></i><p>+123 4567 9876</p></li>
                      <li><i class="flaticon-place"></i><p>123 New Yourk City, US -PA 895<br>Dix 3, Level 5. NYC</p></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php

include 'footer.php';

?>