<?php
include 'layout/header.php';
include 'layout/menu.php';
include 'functions.php';
global $conn;

if(isset($_GET['id']) && !empty($_GET['id'])){
   $response = deletedepartment($_GET['id']);
	
	if($response['status'] == 0){
		header('Location:department.php');	
	}else{
		$responseMsg = $response['message'];
	}
}

?>

		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">List of Course</h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="add-department.php" class="btn btn-primary rounded"><i class="fa fa-plus"></i> List Of Department</a>
						</div>
						
					</div>					
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table m-b-0">
									<thead>
										<tr>
											<th>SrNo</th>
											<th>Name</th>
											<th>Image</th>
											<th>Phone Number</th>
											<th>Email</th>
											<th>Department</th>
											<th>Action</>
											
											
											
											
										</tr>
									</thead>
									
									<tbody>
										<?php 
										//p($studentData)
										$departmentData = getAllDepartment();
										if(!empty($departmentData)){
										$i=0;
										foreach($departmentData as $value){
											$i++;
									?>
										<tr class="danger odd" role="row">
                                                <td class="mailbox-name sorting_1"><?php echo $i;?></td>
                                                <td class="mailbox-name sorting_1"><?php echo $value['name']?></td>                                                
                                                <td class="mailbox-name sorting_1" ><?php echo $value['image']?></td>    
                                                <td class="mailbox-name sorting_1" ><?php echo $value['phone_number']?></td>    
                                                <td class="mailbox-name sorting_1" ><?php echo $value['email']?></td>    
                                                <td class="mailbox-name sorting_1" ><?php echo $value['department']?></td>    
                                                    
												
                                                                                              
                                                                                               
												
                                                <td class="text-right"> 
													<a class="btn btn-info" href="add-department.php?id=<?php echo$value['id'];?>"> <i class="fa fa-pencil"> </i> </a>
													<button class="btn btn-danger" onclick="deletedepartment('<?php echo $value['id']; ?>','<?php echo $value['name']; ?>')"> <i class="fa fa-close"> </i> </button>
												</td>           
                                              
                                                
                                            </tr>
										<?php } 
										
										} else {?>
										<tr>
										<td colspan="8"><span class="no-record">No record found!</span></td>
										</tr>
										<?php } ?>
																		
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
		
		</div>
		</div>
		<script>
		    function deletedepartment (pvarId, pvarName){
				
				var c =confirm("Are you sure you want to delete this department ("+ pvarName +") ?");
				if(c == true){
					location.href="department.php?id="+ pvarId;
				}else{
					location.href="department.php";
					return false;
				}
			}
			</script>
	<?php "layout/footer.php"; ?>	
