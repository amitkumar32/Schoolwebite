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
							<h4 class="page-title"> Question Detail </h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="questions-list.php" class="btn btn-primary rounded"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="m-b-30">							
							
								<form method="post">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Question Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="" name="question_name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Option-A</label>
												<input class="form-control" type="text" value="" name="last_name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Option-B</label>
												<input class="form-control" type="text" value="" name="last_name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Option-C</label>
												<input class="form-control" type="text" value="" name="last_name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Option-D</label>
												<input class="form-control" type="text" value="" name="last_name" required>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Right Answer</label>
												<select class="form-control" name="speciality" required>
													<option value="a"> Option-A </option>
													<option value="a"> Option-B </option>
													<option value="a"> Option-C </option>
													<option value="a"> Option-D </option>
												</select>
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
	
