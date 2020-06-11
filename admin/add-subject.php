<?php
include 'layout/header.php';
include 'layout/menu.php';
//include './functions.php';
ob_start();
global $conn;
?>
		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title"> Subject Detail </h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="subject-list.php" class="btn btn-primary rounded"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="m-b-30">							
							
								<form method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Subject Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="" name="first_name" required>
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
	
