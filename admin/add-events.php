<?php
include 'layout/header.php';
include 'layout/menu.php';
include 'functions.php';
ob_start();
// edit studet data


global $conn;
$title = '';
$discription = '';
$more_discription='';
$start_time='';
$time_to='';
$time_from='';
$image='';
if(isset($_GET['id']) && !empty($_GET['id'])){
	
   $eventData = getEventDetail($_GET['id']);
   $title = $eventData['first_name'];
   $discription = $eventData['discription'];
   
   $more_discription=$eventData['more-discription'];
   $start_time=$eventData['start_time'];
   $time_to=$eventData['time_to'];
   $time_from=$eventData['time_from'];
   $image=$eventData['image'];
  }

// finish here
?>
		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title"> event Post </h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="events.php" class="btn btn-primary rounded"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
					</div>
					
					<?php 
			//p($studentData);
			
			if(isset ($_POST["submit"])){				
				$result = addupdateEvent($_POST); //function name in functions.php
				if($result['status'] == 0){
					header('Location:events.php');
				}else{
					$reponseMsg= $result['message'];
				}			
			}
			?>
					
					
					
					
					<div class="row">
						<div class="col-md-12">
							<div class="m-b-30">							
							
								<form method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Title<span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="" name="title" required>
											</div>
										</div>
										
										
										
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Start Date</label>
												<input class="form-control" type="date" value="" name="start_date" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Time To</label>
												<input class="form-control" type="time" value="" name="time_to" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Time From</label>
												<input class="form-control" type="time" value="" name="time_from" required>
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
												<label class="control-label">More Discription</label>
												<textarea cols="5" rows="3" class="form-control"  value="" name="more-discription" required style="resize:none"></textarea>
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
	
