<?php
include 'layout/header.php';
include 'layout/menu.php';
include 'functions.php';
global $conn;

//for delete student
if(isset($_GET['id']) && !empty($_GET['id'])){
   $response = deleteStudent($_GET['id']);
	
	if($response['status'] == 0){
		header('Location:student-list.php');	
	}else{
		$responseMsg = $response['message'];
	}
}
//get all active students
$studentData = getAllStudent();
?>

		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">List of students </h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="add-student.php" class="btn btn-primary rounded"><i class="fa fa-plus"></i> New Subject</a>
						</div>
					</div>		
					<?php echo $responseMsg; ?>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table m-b-0">
									<thead>
										<tr>
											<th>Sr No</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Email</th>
											<th>Password</th>
											<th>Course</th>
											<th>Phone Number</th>
											<th>Action</th>													
										</tr>
									</thead>
									<tbody>
									
									<?php 
										//p($studentData)
										if(!empty($studentData)){
										$i=0;
										foreach($studentData as $value){
											$i++;
									?>
										
										<tr class="danger odd" role="row">
                                                <td class="mailbox-name sorting_1"><?php echo $i; ?></td>
                                                <td class="mailbox-name sorting_1"><?php echo $value['first_name']; ?></td>                                                
                                                <td class="mailbox-name sorting_1"><?php echo $value['last_name'] ?></td>                                                
                                                <td class="mailbox-name sorting_1"><?php echo $value['email'] ?></td>                                                
                                                <td class="mailbox-name sorting_1"><?php echo $value['password'] ?></td>                                                
                                                <td class="mailbox-name sorting_1"><?php echo $value['course'] ?></td>                                                
                                                <td class="mailbox-name sorting_1"><?php echo $value['phone_number'] ?></td>                                                
												
                                                <td class="text-right"> 
													<a class="btn btn-info" href="add-student.php?id=<?php echo $value['id']; ?>"> <i class="fa fa-pencil"> </i> </a>
													<button class="btn btn-danger" onclick="deteteStudent('<?php echo $value['id']; ?>','<?php echo $value['fname']; ?>')"> <i class="fa fa-close"> </i> </button>
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
		    function deteteStudent (pvarId, pvarName){
				var c = confirm("Are you sure you want to delete this student ("+ pvarName +") ?");
				if(c == true){
					location.href="student-list.php?id="+ pvarId;
				}else{
					location.href="student-list.php";
					return false;
				}
			}
			</script>
	<?php "layout/footer.php"; ?>	