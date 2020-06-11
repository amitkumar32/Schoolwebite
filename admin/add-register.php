<?php
include 'layout/header.php';
include 'layout/menu.php';
include 'functions.php';
ob_start();
global $conn;
?>
		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title"> Blog Post </h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="register.php" class="btn btn-primary rounded"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
					</div>
					<?php
					if(isset ($_POST["submit"])){				
				$result = addupdateRegister($_POST); //function name in functions.php
				if($result['status'] == 0){
					header('Location:register.php');
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
												<input class="form-control" type="text" value="" name="name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Last Name<span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="" name="last_name" required>
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
												<label class="control-label">Phone Number</label>
												<input class="form-control" type="number" value="" name="phone_number" required>
											</div>
											</div>
												<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">password</label>
												<input class="form-control" type="text" value="" name="password" required>
											</div>
											</div>
											<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Course<span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="" name="course" required>
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
	
