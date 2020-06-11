  <?php
  include 'header.php';
  global $conn;
  
 


if(isset($_GET['id']) && !empty($_GET['id'])){
	
   $courseData = getcourseDetail($_GET['id']);
  // p($courseData);  
}
  
  
  ?>
 <style>
   
  
  .course-details-banner {
    background-image: url(images/course-details.jpg);
}
</style>
<section class="single-banner course-details-banner">
    <div class="page-breadcums">
      <div class="container">
        <ul class="page-list">
          <li><a href="home-one.html">Home</a></li>
          <li>course details</li>
        </ul>
      </div>
    </div>
    <div class="banner-content-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="banner-content text-center">
              <h1 class="banner-title">Course Details</h1>
              <p><?php echo $courseData['discription'];?></p>
              <a href="#" class="cmn-button">admission</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="course-details-section section-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="course-details-wrapper">
            <div class="course-details-items">
              <div class="row mt-mb-10">
                <div class="col-md-4 col-sm-4">
                  <div class="course-details-single d-flex">
                    <div class="course-details-icon">
                      <i class="flaticon-calendar"></i>
                    </div>
                    <div class="course-details-content">
                      <span class="item-top-title">Admission ends</span>
                      <h6 class="course-item-title">Jan 2019</h6>
                    </div>
                  </div>
                </div><!-- course-details-single end -->
                <div class="col-md-4 col-sm-4">
                  <div class="course-details-single d-flex">
                    <div class="course-details-icon">
                      <i class="flaticon-clock"></i>
                    </div>
                    <div class="course-details-content">
                      <span class="item-top-title">course durattion</span>
                      <h6 class="course-item-title">4 years</h6>
                    </div>
                  </div>
                </div><!-- course-details-single end -->
                <div class="col-md-4 col-sm-4">
                  <div class="course-details-single d-flex">
                    <div class="course-details-icon">
                      <i class="flaticon-college-graduation"></i>
                    </div>
                    <div class="course-details-content">
                      <span class="item-top-title">total credits</span>
                      <h6 class="course-item-title">148 credites</h6>
                    </div>
                  </div>
                </div><!-- course-details-single end -->
              </div>
            </div>
            <div class="entry-single">
		
              <div class="entry-single-thumb">
                <img src="admin/images/uploads/<?php echo $courseData['image'];?>" alt="course-details">
              </div>
              <div class="entry-single-content">
                <h2 class="entry-single-title"><?php echo $courseData['title']; ?></h2>
                <p><?php echo $courseData['discription'];?> </p>
                <p><?php echo $courseData['more_discription'];?> </p>
                
                <a href="#" class="cmn-button">apply now</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="sidebar-area">
            <div class="widget courses-list-widget">
              <h5 class="widget-title">All Courses</h5>
			  <?php
								$courseData = getcourse();
								if(!empty($courseData)){
									$i=0;
									foreach($courseData as $value){
										$i++;
								
								
								?>
              <ul>
                <li><a href="#"><?php  echo $value['title']; ?><span><?php echo $value['fees']; ?></span></a></li>
                
              </ul>
			  <?php } 
										
									} else {?>
									<tr>
									<td colspan="8"><span class="no-record"></span></td>
									</tr>
									<?php } ?>
            </div><!--widget end -->
            <!-- widget end -->
           
          </div>
        </div>
      </div>
      <div class="course-section section-padding">
        <div class="section-header text-center">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <h2 class="section-title">our courses</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
            </div>
          </div>
        </div>
		 
        <div class="section-wrapper">
		 
          <div class="row mt-mb-15 course-grid-block">
		  
		  <?php
								$course = getCourseByLimit();
								if(!empty($course)){
									$i=0;
									foreach($course as $value){
										$i++;
								
								
								?>
            <div class="col-lg-4 col-sm-6">
              <div class="course-item">
			  
                <div class="course-thumb">
                  <a href="#"><img src="admin/images/uploads/<?php echo $value['image'];?>" alt="course-thumb"></a>
                  <span class="course-price"><?php echo $value['fees']; ?></span>
                </div>
                <div class="course-content">
                  <h5 class="course-title"><a href="#"><?php echo $value['title'];?></a></h5>
                  <p><?php echo $value['discription'];?> </p>
                  <a href="id=<?php echo $value['id'];?>" class="simple-btn">course details<i class="fa fa-long-arrow-right"></i></a>
                </div>
                  
              </div>
			 
            </div><!-- course-item end -->
           
             <?php } }?>
        </div>
		
      </div>
	 
    </div>
  </section>






<?php
include 'footer.php';

?>


