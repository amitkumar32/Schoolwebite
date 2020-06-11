<?php
include 'layout/header.php';
include 'layout/menu.php';
include 'functions.php';
ob_start();


// edit course
global $conn;
$title = '';
$discription='';
$fees='';
$more_discription='';
if(isset($_GET['id']) && !empty($_GET['id'])){
	
   $courseData = getcourseDetail($_GET['id']);
   $title = $courseData['title']; 
   $discription = $courseData['discription'];
   $fees=$courseData['fees'];
   $more_discription=$courseData['more_discription'];
   $imageName=$courseData['image'];
   
}

?>
		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title"> Course Post </h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="course.php" class="btn btn-primary rounded"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
					</div>
					<?php 
			//p($studentData);
			// send data in database
			if(isset ($_POST["submit"])){				
				$result = addupdatecourse($_POST); //function name in functions.php
				if($result['status'] == 0){
					header('Location:course.php');
				}else{
					$reponseMsg = $result['message'];
				 }			
			}
			// end here
			?>


					<div class="row">
						<div class="col-md-12">
							<div class="m-b-30">							
							
								<form method="post"  enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Title<span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="" name="title" required>
											</div>
										</div>
			
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Discription</label>
												<textarea class="form-control" cols="5" rows="3" value="" name="discription" required style="resize:none"></textarea>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Fees</label>
												<input class="form-control" type="number" value="" name="fees" required>
											</div>
										</div>

										



										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">More Discription</label>
												<textarea cols="5" rows="3" class="form-control"  value="" name="more_discription" required style="resize:none"></textarea>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Image</label>
												<input class="form-control" type="file" value="" name="image" >
											</div>
										</div>
										
										
										
										<div class="col-md-12">
											<button class="btn btn-primary" type="submit" name="submit">Submit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
                </div>
		
		
			
      
		</div>
		</div>
	<?php include "layout/footer.php"; ?>	
	
