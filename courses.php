<?php
include 'header.php';
ob_start();
SESSION_START();


?>

   <section class="single-banner course-grid-two-banner">
    <div class="page-breadcums">
      <div class="container">
        <ul class="page-list">
          <li><a href="home-one.html">Home</a></li>
          <li>course grid two</li>
        </ul>
      </div>
    </div>
    <div class="banner-content-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="banner-content text-center">
              <h1 class="banner-title">Our Courses</h1>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's<br> standard dummy text ever since the 1500s.</p>
              <a href="#" class="cmn-button">admission</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <section class="course-grid-section section-bg">
    <div class="container">
      <div class="course-grid-wrapper">
        <div class="select-option-box-area">
          <form class="course-apply-form">
            <div class="row justify-content-center">
              <div class="col-md-4">
                <div class="frm-group apply-options">
                  <select>
                    <option>Select Department</option>
                    <option>Department one</option>
                    <option>Department two</option>
                    <option>Department three</option>
                    <option>Department four</option>
                    <option>Department five</option>
                  </select>
                </div>
              </div><!-- frm-group end -->
              <div class="col-md-3">
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
              </div><!-- frm-group end -->
              <div class="col-md-3">
                <div class="frm-group apply-options">
                  <select>
                    <option>Course Duration</option>
                    <option>Duration one</option>
                    <option>Duration two</option>
                    <option>Duration three</option>
                    <option>Duration four</option>
                    <option>Duration five</option>
                  </select>
                </div>
              </div><!-- frm-group end -->
              <div class="col-lg-2">
                <div class="frm-group">
                  <button type="submit" class="apply-btn">Apply now</button>
				  <input type="hidden" value="" >
                </div>
              </div>
            </div>
          </form>
        </div><!-- course end-->
		
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
				<form method="POST">
				<input type="submit" name="apply" value="apply">
				<input type="hidden" name="course_id" value="<?php echo $value['id'];?>">
				<input type="hidden" name="course_fee" value="<?php echo $value['fees'];?>">
				</form>
              </div>
            </div><!-- course-item end -->
          
								<?php } }?>
		</div>
        </div>
      </div>
	  <?php 
	  //p($_SESSION);
		if(isset($_POST) && $_POST['apply'] == "apply"){
			//echo "hello";
			if(!empty($_SESSION)){				
				$result = applyForCourse($_POST);
				p($result);
				if($result['status'] == 0){
					
				}else{
					echo '<script>alert("Error");</script>';
				}
				
			}else{
				header("Location:login.php");
				
			}  
		}
	  ?>
    <!--  <nav class="d-pagination" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item previous"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item next"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
      </nav>-->
    </div>
  </section>
 <?php
 
 include 'footer.php';

 
 ?>