<?php
include 'layout/header.php';
include 'layout/menu.php';
include 'functions.php';
ob_start();
// edit studet data


global $conn;
$name = '';
$title = '';
$department='';
$phone_number='';
$image='';
if(isset($_GET['id']) && !empty($_GET['id'])){
	
   $teacherData = getTeacherDetail($_GET['id']);
   $name = $teacherData['name'];
   $title = $teacherData['title'];
   $department=$teacherData['department'];
   $phone_number= $teacherData['phone_number'];
   $image= $teacherData['image'];
  }

// finish here
?>
		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title"> teacher Post </h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="teacher.php" class="btn btn-primary rounded"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
					</div>
					<?php
			if(isset ($_POST["submit"])){				
				$result = addupdateTeacher($_POST); //function name in functions.php
				if($result['status'] == 0){
					header('Location:teacher.php');
				}else{
					$reponseMsg= $result['message'];
				}			
			  }
					
					
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="m-b-30">							
							
								<form method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Name<span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="<?php echo $name;?>" name="name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Title<span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="<?php echo $title; ?>" name="title" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Image</label>
												<input class="form-control" type="file" value="" name="image" required>
											</div>
											</div>
												<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Phone Number</label>
												<input class="form-control" type="number" value="<?php echo $phone_number; ?>" name="phone_number" required>
											</div>
											</div>
												<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Department</label>
												<input class="form-control" type="text" value="<?php echo $department; ?>" name="department" required>
											</div>
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
	
