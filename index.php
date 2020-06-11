<?php
include 'header.php';
ob_start();
SESSION_START();
?>
  <section class="banner-section home-three-banner-img">
      <div class="banner-content-area">
        <div class="container">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-7">
                <div class="banner-content">
                  <h1 class="banner-title">Education is The Backbone of a Nation</h1>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's<br> standard dummy text ever since the 1500s.standard dummy text ever since the 1500s.</p>
                  <a href="#" class="cmn-button">about us</a>
                </div>
              </div>
			  <?php
			  
			  if(isset ($_POST["submit"])){				
				$result = addupdateRegister($_POST); //function name in functions.php
				if($result['status'] == 0){
					header('Location:index.php');
				}else{
					$reponseMsg = $result['message'];
				 }			
			}
			  
			  
			  
			  ?>
              <div class="col-lg-4">
                <div class="style-two select-option-box-area">
                  <h3 class="course-apply-title">Open Admission</h3>
                  <form class="course-apply-form" method="post">
				 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="frm-group">
                          <input type="text" name="first_name" id="apply-name" placeholder="First Name" required>
                        </div>
                      </div>
					  <div class="col-md-12">
                        <div class="frm-group">
                         <input type="text" name="last_name"  placeholder="Last Name" required>
                        </div>
                      </div>
					  <div class="col-md-12">
                        <div class="frm-group">
                          <input type="email" name="email" id="apply-email" placeholder="Email" required>
                        </div>
                      </div>
					  <div class="col-md-12">
                        <div class="frm-group">
                       <input type="tel" name="phone"  placeholder="Phone Number" required>
                        </div>
                      </div>
					  <div class="col-md-12">
                        <div class="frm-group">
                    <input type="password" name="password"  placeholder="Type password" required>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="frm-group apply-options">
						 
                          <select>
						   <?php
								$courseData = getcourse();
								if(!empty($courseData)){
									$i=0;
									foreach($courseData as $value){
										$i++;
								
								
								?>
								
                            <option value="<?php echo  $value['id'];?>"><?php echo $value['title'];?></option>
                           
							<?php }}?>
                          </select>
								
                        </div>
                      </div><!-- frm-group end -->
                        <?php
				if(isset($_POST['submit'])){
								$loginData = login($_POST);
			
								if(!empty($loginData)){
								//p($loginData);
								if($loginData['status'] == 0){
									echo $loginData['data']['first_name'];
									$_SESSION["username"] = $loginData['data']['first_name'];
									//header('location: index.php');
									header('Location:courses.php');
								}else{
									header('Location:index.php');
								}
									
								}
								
				}
								?>
                      <div class="col-lg-12">
                        <div class="frm-group">
						
                          <button type="submit" name="submit" class="apply-btn">Apply now</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- <div class="row">

    <div class="col-lg-8">
        <div class="banner-content">
            <h1 class="banner-title">Education is The Backbone of a Nation</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's<br> standard dummy text ever since the 1500s.standard dummy text ever since the 1500s.</p>
            <a href="#" class="cmn-button">about us</a>
          </div>
    </div>


    <div class="col-lg-4">
        <div class="style-two select-option-box-area">
            <h3 class="course-apply-title">Open Admission</h3>
            <form class="course-apply-form">
              <div class="row">
                <div class="col-md-12">
                  <div class="frm-group">
                    <input type="text" id="apply-name" placeholder="Your Name">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="frm-group">
                    <input type="email" id="apply-email" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="frm-group apply-options">
                    <select>
                      <option>Choose Course</option>
                      <option>Course one</option>
                      <option>Course two</option>
                      <option>Course three</option>
                      <option>Course four</option>
                      <option>Course five</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="frm-group apply-options">
                    <select>
                      <option>Select semister</option>
                      <option>semister one</option>
                      <option>semister two</option>
                      <option>semister three</option>
                      <option>semister four</option>
                      <option>semister five</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="frm-group">
                    <button type="submit" class="apply-btn">Apply now</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
    </div>
  </div> -->

  <section class="info-section color-style-one hover-none bottom-shadow section-padding">
    <div class="info-items-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 pr-0 pl-0 info-item" style="color: #ffff;">
            <div class="info-item-inner" style="background-color:#faa603 ;">
              <div class="info-item-head d-flex align-items-center">
                <div class="info-item-icon"><i class="flaticon-college-graduation"></i></div>
                <h4 class="info-title">Admission Center</h4>
              </div>
              <div class="content">
                <p>It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                <a href="#" class="simple-btn">learn more<i class="fa fa-long-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 pr-0 pl-0 info-item" style="color: #ffff;">
            <div class="info-item-inner" style="background-color:#faa603 ;">
              <div class="info-item-head d-flex align-items-center">
                <div class="info-item-icon"><i class="flaticon-customer-service"></i></div>
                <h4 class="info-title">Information Center</h4>
              </div>
              <div class="content">
                <p>It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                <a href="#" class="simple-btn">learn more<i class="fa fa-long-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 pr-0 pl-0 info-item" style="color: #ffff;">
            <div class="info-item-inner" style="background-color:#faa603 ;">
              <div class="info-item-head d-flex align-items-center">
                <div class="info-item-icon"><i class="flaticon-touch-of-one-finger-of-solid-black-hand-symbol"></i>
                </div>
                <h4 class="info-title">Our Programs</h4>
              </div>
              <div class="content">
                <p>It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                <a href="#" class="simple-btn">learn more<i class="fa fa-long-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="course-section section-padding section-bg">
      <div class="container">
        <div class="section-header text-center">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <h2 class="section-title">our courses</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
            </div>
          </div>
        </div>
		
			

		
        <div class="section-wrapper">
          <div class="row mt-mb-15">
		  <?php
								$courseData = getcourse();
								if(!empty($courseData)){
									$i=0;
									foreach($courseData as $value){
										$i++;
								
								
								?>	
            <div class="col-lg-4 col-sm-6">
              <div class="course-item">
                <div class="course-thumb">
                  <a href="#"><img src="admin/images/uploads/<?php echo $value['image']; ?>" alt="course-thumb"></a>
                </div>
                <div class="course-content">
                  <h5 class="course-title"><a href="#"><?php echo $value['title']?></a></h5>
                  <p><?php echo $value['discription']; ?> </p>
                  <a href="course-details.php?id=<?php echo $value['id'];?>" class="simple-btn">course details<i class="fa fa-long-arrow-right"></i></a>
                </div>
                <div class="course-item-bottom">
                  <ul class="course-review-list d-flex">
                    <li> Fees </li>
                    <li><span class="course-love-num"><?php echo $value['fees'];?></span></li>
                  </ul>
                </div>
              </div>
            </div><!-- course-item end -->
          
								<?php } }?>
		</div>
        </div>
      </div>
	  
    </section>
    <section class="benefits-facilities-section section-padding section-bottom-bg">
        <div class="container">
          <div class="section-header text-center">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <h2 class="section-title">Our Courses Benefits</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
              </div>
            </div>
          </div>
          <div class="section-wrapper">
            <div class="row mt-mb-15 justify-content-center">
              <div class="col-lg-4 col-md-6">
                <div class="single-item-style-four">
                  <div class="single-item-head d-flex align-items-center">
                    <div class="icon"><i class="flaticon-prize-badge-with-star-and-ribbon"></i></div>
                    <h5 class="item-title">Incomparable Quality</h5>
                  </div>
                  <div class="content">
                    <p>It was on popularised in the 1960s with the release of Letraset sheets containing.</p>
                  </div>
                </div>
              </div><!--benefits-item end -->
              <div class="col-lg-4 col-md-6">
                <div class="single-item-style-four">
                  <div class="single-item-head d-flex align-items-center">
                    <div class="icon"><i class="flaticon-college-graduation"></i></div>
                    <h5 class="item-title">Professional Certificate</h5>
                  </div>
                  <div class="content">
                    <p>It was on popularised in the 1960s with the release of Letraset sheets containing.</p>
                  </div>
                </div>
              </div><!--benefits-item end -->
              <div class="col-lg-4 col-md-6">
                <div class="single-item-style-four">
                  <div class="single-item-head d-flex align-items-center">
                    <div class="icon"><i class="flaticon-world"></i></div>
                    <h5 class="item-title">Professional Certificate</h5>
                  </div>
                  <div class="content">
                    <p>It was on popularised in the 1960s with the release of Letraset sheets containing.</p>
                  </div>
                </div>
              </div><!--benefits-item end -->
            </div>
          </div>
        </div>
        </section>
        <section class="coming-events-section section-padding">
            <div class="container">
              <div class="section-header text-center">
                <div class="row justify-content-center">
                  <div class="col-lg-8">
                    <h2 class="section-title">Join Our Upcoming events</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                  </div>
                </div>
              </div>
              <div class="section-wrapper">
                <div class="row mt-mb-10">
                <?php
								$eventData = getAllEvent();
								if(!empty($eventData)){
									$i=0;
									foreach($eventData as $value){
										$i++;
								
								
								?>
                  <div class="col-lg-6">
                    <div class="event-item item-style-three d-flex align-items-center">
                      <div class="event-left">
                        <div class="event-thumb">
                          <img src="admin/images/uploads/<?php echo $value['image'];?>" alt="event-image">
                        </div>
                        <div class="event-date text-center">
                          <span class="date"><?php echo $value['date'];?></span>
                          <span class="month">January</span>
                        </div>
                      </div>
                      <div class="event-content">
                        <h4 class="event-title"><?php echo $value['title'];?></h4>
                        <ul class="event-time-add-list d-flex align-items-center">
                          <li><i class="flaticon-clock"></i><p><?php echo $value['time_to'];?></p></li>
                          <li><i class="flaticon-place"></i><p>Elivent Center, 201 NYC</p></li>
                        </ul>
                        <p><?php $value['discription'];?></p>
                      </div>
                    </div>
                  </div><!-- event-item end -->
                  <?php }}?>
                </div>
              </div>
            </div>
          </section>
          <section class="features-section">
            <div class="row mr-0 ml-0">
              <div class="col-lg-6 features-video-block" style="background-image: url(assets/images/video-bg3.jpg);">
                <a class="video-button" href="https://www.youtube.com/embed/aFYlAzQHnY4" data-rel="lightcase:myCollection"><i class="fa fa-play"></i></a>
              </div>
              <div class="col-lg-6 features-content-block section-bg">
                <div class="section-header">
                  <h2 class="section-title">Best place to build your career</h2>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. The concept lorem Ipsum has been the industry's standard dummy text</p>
                </div>
                <div class="section-wrapper">
                  <div class="row mt-mb-15">
                    <div class="col-lg-6 col-sm-6">
                      <div class="single-item-style-seven">
                        <div class="single-item-head d-flex align-items-center">
                          <div class="icon"><i class="flaticon-trophy"></i></div>
                          <h5 class="item-title">Student Hostel</h5>
                        </div>
                        <div class="content">
                          <p>It was on popularised in the 1960s with the release of Letraset sheets containing.</p>
                        </div>
                      </div>
                    </div><!-- features-item end -->
                    <div class="col-lg-6 col-sm-6">
                      <div class="single-item-style-seven">
                        <div class="single-item-head d-flex align-items-center">
                          <div class="icon"><i class="flaticon-college-graduation"></i></div>
                          <h5 class="item-title">Better Education</h5>
                        </div>
                        <div class="content">
                          <p>It was on popularised in the 1960s with the release of Letraset sheets containing.</p>
                        </div>
                      </div>
                    </div><!-- features-item end -->
                    <div class="col-lg-6 col-sm-6">
                      <div class="single-item-style-seven">
                        <div class="single-item-head d-flex align-items-center">
                          <div class="icon"><i class="flaticon-university-campus"></i></div>
                          <h5 class="item-title">Biggest Campus</h5>
                        </div>
                        <div class="content">
                          <p>It was on popularised in the 1960s with the release of Letraset sheets containing.</p>
                        </div>
                      </div>
                    </div><!-- features-item end -->
                    <div class="col-lg-6 col-sm-6">
                      <div class="single-item-style-seven">
                        <div class="single-item-head d-flex align-items-center">
                          <div class="icon"><i class="flaticon-prize-badge-with-star-and-ribbon"></i></div>
                          <h5 class="item-title">Incamparable Quality</h5>
                        </div>
                        <div class="content">
                          <p>It was on popularised in the 1960s with the release of Letraset sheets containing.</p>
                        </div>
                      </div>
                    </div><!-- features-item end -->
                  </div>
                </div>
              </div>
            </div>
          </section>

          <section class="teachers-section section-padding">
            <div class="container">
              <div class="section-header text-center">
                <div class="row justify-content-center">
                  <div class="col-lg-8">
                    <h2 class="section-title">Our Department Heads</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                  </div>
                </div>
              </div>
              <div class="section-wrapper">
                <div class="row mt-mb-15">
                <?php
								$departmentData = getAllDepartment();
								if(!empty($departmentData)){
									$i=0;
									foreach($departmentData as $value){
										$i++;
								
								
								?>
                  <div class="col-lg-3 col-sm-6">
                    <div class="teacher-single text-center">
                      <div class="teacher-thumb">
                        <img src="admin/images/uploads/<?php echo $value['image'];?>" alt="teacher-image">
                      </div>
                      <div class="teacher-content">
                        <h4 class="teacher-name"><a href="#"><?php echo $value['name'];?></a></h4>
                        <span class="teacher-designation"><?php echo $value['department'];?></span>
                        <ul class="teacher-social-links d-flex justify-content-center">
                          <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div><!-- teacher-single end-->
                  <?php }}?>
                </div>
              </div>
            </div>
          </section>

          
          <section class="testimonial-section section-padding section-bg">
            <div class="container">
              <div class="section-header text-center">
                <div class="row justify-content-center">
                  <div class="col-lg-8">
                    <h2 class="section-title">what our students say</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                  </div>
                </div>
              </div>
              <div class="section-wrapper">
                <div class="owl-carousel testmonial-slider owl-loaded owl-drag">
                    <!-- testimonial-item end -->
                    <!-- testimonial-item end -->
                    <!-- testimonial-item end -->
                    <!-- testimonial-item end -->
                <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1480px;     display: flex">
                  <div class="owl-item active" style="width: 370px;"><div class="testimonial-item style-two">
                      <div class="testimonial-head d-flex align-items-center">
                        <div class="thumb"><img src="images/muk.png" alt="testimonial-image"></div>
                        <div class="client-details">
                          <h4 class="name">Muktasina Islam</h4>
                          <span class="designation">fashion design</span>
                        </div>
                      </div>
                      <div class="testimonial-conetnt">
                        <p>Suffered are many variation of passages  lorem availle there on alterati of some form by the injected for users.</p>
                        <div class="client-star">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                      </div>
                    </div></div><div class="owl-item active" style="width: 370px;"><div class="testimonial-item style-two">
                      <div class="testimonial-head d-flex align-items-center">
                        <div class="thumb"><img src="images/hasi.png" alt="testimonial-image"></div>
                        <div class="client-details">
                          <h4 class="name">Hasibur Rahman</h4>
                          <span class="designation">Comuter Science</span>
                        </div>
                      </div>
                      <div class="testimonial-conetnt">
                        <p>Suffered are many variation of passages  lorem availle there on alterati of some form by the injected for users.</p>
                        <div class="client-star">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                      </div>
                    </div></div><div class="owl-item active" style="width: 370px;"><div class="testimonial-item style-two">
                      <div class="testimonial-head d-flex align-items-center">
                        <div class="thumb"><img src="images/sum.png" alt="testimonial-image"></div>
                        <div class="client-details">
                          <h4 class="name">Sumayea Islam</h4>
                          <span class="designation">Multimedia Technology</span>
                        </div>
                      </div>
                      <div class="testimonial-conetnt">
                        <p>Suffered are many variation of passages  lorem availle there on alterati of some form by the injected for users.</p>
                        <div class="client-star">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                      </div>
                    </div></div><div class="owl-item" style="width: 370px;"><div class="testimonial-item style-two">
                      <div class="testimonial-head d-flex align-items-center">
                        <div class="thumb"><img src="images/muk.png" alt="testimonial-image"></div>
                        <div class="client-details">
                          <h4 class="name">Muktasina Islam</h4>
                          <span class="designation">fashion design</span>
                        </div>
                      </div>
                      <div class="testimonial-conetnt">
                        <div class="client-star">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                        <p>Suffered are many variation of passages  lorem availle there on alterati of some form by the injected for users.</p>
                      </div>
                    </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div>
              </div><!-- section-wrapper end -->
            </div>
          </section>
<?php
include 'footer.php';

?>
 