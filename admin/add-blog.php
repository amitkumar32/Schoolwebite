<?php
include 'layout/header.php';
include 'layout/menu.php';
include 'functions.php';
ob_start();
// edit blog data


global $conn;
$title = '';
$date='';
$discription = '';
$more_discription='';


if(isset($_GET['id']) && !empty($_GET['id'])){
	
   $blogData = getBlogDetail($_GET['id']);
   $title = $blogData['title'];
   $date    =    $blogData['date'];
   $discription =  $blogData['discription'];
   $more_discription  =    $blogData['more_discription'];
  

   
  }

// finish here
?>
		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title"> Blog Post </h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="blog-post.php" class="btn btn-primary rounded"><i class="fa fa-arrow-left"></i> Back</a>
						</div>
					</div>
					<?php 
			//p($studentData);
			
			if(isset ($_POST["submit"])){				
				$result = addupdateBlog($_POST); //function name in functions.php
				if($result['status'] == 0){
					header('Location:blog-post.php');
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
												<label class="control-label">Title<span class="text-danger">*</span></label>
												<input class="form-control" type="text" value="<?php echo $title; ?>" name="title" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Date</label>
												<input class="form-control" type="date" value="<?php echo $date;?>" name="date" required>
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Discription</label>
												<textarea class="form-control" cols="5" rows="3" value="<?php echo $discription; ?>" name="discription" required style="resize:none"></textarea>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">More Discription</label>
												<textarea cols="5" rows="3" class="form-control"  value="<?php echo $more_discription; ?>" name="more_discription" required style="resize:none"></textarea>
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
	
