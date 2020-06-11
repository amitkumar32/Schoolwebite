<?php
include 'layout/header.php';
include 'layout/menu.php';
include 'functions.php';
ob_start();
// edit studet data


global $conn;
$first_name = '';
$last_name = '';
$email='';
$password='';
$course='';
$phone_number='';
if(isset($_GET['id']) && !empty($_GET['id'])){
	
   $studentData = getStudentDetail($_GET['id']);
   $first_name = $studentData['first_name'];
   $last_name = $studentData['last_name'];
   
   $email=$studentData['email'];
   $password=$studentData['password'];
   $course=$studentData['course'];
   $phone_number=$studentData['phone_number'];
   
  }

// finish here
?>

<div class="page-wrapper" style="min-height: 328px;">
		<div class="content container-fluid">
			<div class="row">
				<div class="col-sm-8">
					<h4 class="page-title"> Student Detail </h4>
				</div>
				<div class="col-sm-4 text-right m-b-30">
					<a href="student-list.php" class="btn btn-primary rounded"><i class="fa fa-arrow-left"></i> Back</a>
				</div>
			</div>
			<?php 
			//p($studentData);
			
			if(isset ($_POST["submit"])){				
				$result = addupdateStudent($_POST); //function name in functions.php
				if($result['status'] == 0){
					header('Location:student-list.php');
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
										<label class="control-label">First Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text" value="<?php echo $first_name; ?>" name="first_name" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Last Name</label>
										<input class="form-control" type="text" value="<?php echo $last_name; ?>" name="last_name" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Email</label>
										<input class="form-control" type="text" value="<?php echo $email; ?>" name="email" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Password</label>
										<input class="form-control" type="password" value="<?php echo $password; ?>" name="password" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">course</label>
										<input class="form-control" type="text" value="<?php echo $course; ?>" name="course" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Phone Number</label>
										<input class="form-control" type="text" value="<?php echo $phone_number; ?>" name="phone_number" required>
									</div>
								</div>
								
								<?php echo $reponseMsg; ?>
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
	
