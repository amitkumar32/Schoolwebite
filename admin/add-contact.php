<?php
include 'layout/header.php';
include 'layout/menu.php';
include 'functions.php';
//include './functions.php';
ob_start();

// edit contact
global $conn;
$name = '';
$email='';
$phone_number='';
$subject='';
if(isset($_GET['id']) && !empty($_GET['id'])){
	
   $contactData = getcontactDetail($_GET['id']);
   $name = $contactData['name']; 
   $email=$contactData['email'];
   $phone_number=$contactData['phone_number'];
   $subject=$contactData['subject'];
   
  }
// end here




?>
		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title"> Contact Post </h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="contact.php" class="btn btn-primary rounded"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
					</div>
					<?php 
			//p($studentData);
			// send data in database
			if(isset ($_POST["submit"])){				
				$result = addupdatecontact($_POST); //function name in functions.php
				if($result['status'] == 0){
					header('Location:contact.php');
				}else{
					$reponseMsg = $result['message'];
				 }			
			}
			// end here
			?>
				
					
					
					
					
					
					<div class="row">
						<div class="col-md-12">
							<div class="m-b-30">							
							
								<form method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Name<span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="<?php echo $name; ?>" name="name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Email</label>
												<input class="form-control" type="mail" value="<?php echo $email; ?>" name="email" required>
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
												<label class="control-label">Subject</label>
												<input class="form-control" type="text" value="<?php echo $subject; ?>" name="subject" required>
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
	
