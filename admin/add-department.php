<?php
include 'layout/header.php';
include 'layout/menu.php';
include 'functions.php';
ob_start();
global $conn;
$title = '';
$phone_number = '';
$email='';
$department='';

if(isset($_GET['id']) && !empty($_GET['id'])){
	
   $departmentData = getDepartmentDetail($_GET['id']);
   $name = $departmentData['name'];
   $email=$departmentData['email'];
   $phone_number=$departmentData['phone_number'];
   $department=$departmentData['department'];
   $imageName=$departmentData['image'];
   
}
?>
		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title"> Department Post </h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="department.php" class="btn btn-primary rounded"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
					</div>


					<?php 
			//p($studentData);
			// send data in database
			if(isset ($_POST["submit"])){				
				$result = addupdatedepartment($_POST); //function name in functions.php
				if($result['status'] == 0){
					header('Location:department.php');
				}else{
					$reponseMsg = $result['message'];
				 }			
			}
			// end here
			?>
					<div class="row">
						<div class="col-md-12">
							<div class="m-b-30">							
							
								<form method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Name<span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="" name="name" required>
											</div>
										</div>
										
												<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Phone Number</label>
												<input class="form-control" type="number" value="" name="phone_number" required>
											</div>
											</div>
												<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Email</label>
												<input class="form-control" type="mail" value="" name="email" required>
											</div>
											</div>
												<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Department</label>
												<input class="form-control" type="text" value="" name="department" required>
											</div>
											</div>
											<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Image</label>
												<input class="form-control" type="file" value="" name="image" required>
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
	
