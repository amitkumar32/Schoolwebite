<?php
include 'header.php';
ob_start();
SESSION_START();

?>
  <?php
				if(isset($_POST['submit'])){
								$loginData = login($_POST);
			
								if(!empty($loginData)){
								//p($loginData);
								if($loginData['status'] == 0){
									echo $loginData['data']['first_name'];
									$_SESSION["username"] = $loginData['data']['first_name'];
									$_SESSION["userid"] = $loginData['data']['id'];
									//header('location: index.php');
									header('Location:index.php');
								}else{
									$smg = '<p style="color:red">User not found with this email and password!</p>';
								}
									
								}else{
									$smg = '<p style="color:red">User not found with this email and password!</p>';
								}
								
				}
								?>
  <section class="single-banner login-banner">
        <div class="banner-content-area">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-10">
                <div class="banner-content text-center">
                  <h1 class="banner-title">Login Account</h1>
                </div>
                <div class="page-breadcums">
                  <div class="container">
                    <ul class="page-list">
                      <li><a href="home-one.html">Home</a></li>
                      <li>login account</li>
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
                <div class="row">
                  <div class="col-md-6 create-account-left">
                    <a class="video-bnt" href="#"><i class="fa fa-play"></i></a>
                  </div>
				
                  <div class="col-md-6">
                    <div class="create-account-form-area form-area">
                      <h4 class="form-title">Login to Account</h4>
                      <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below</p>
					  <?php echo $smg; ?>
                      <form class="login-form form-style-one" method="post">
					  
                        <div class="frm-group">
						
                          <i class="fa fa-envelope"></i>
                          <input type="email" name="email"  id="email" placeholder="Email">
                        </div>
                        <div class="frm-group">
                            <i class="fa fa-globe"></i>
                            <input type="password" name="password" id="pass" placeholder="Type password">
                          </div>
                        <div class="frm-group text-center">
                          <button type="submit" name="submit" class="apply-btn">Login</button>
                          <a href="create-account.html" class="account-log-btn">Create an Account</a>
                        </div>
                      </form>
                    </div><!-- create-account-form-area end -->
                  </div>
								
                </div>
              </div>
            </div>
          </section>

          

<?
include 'footer.php';

?> 


