<?php
include 'layout/header.php';
include 'layout/menu.php';
include 'functions.php';
global $conn;
?>

		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">List of Registration </h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="add-register.php" class="btn btn-primary rounded"><i class="fa fa-plus"></i> New Course</a>
						</div>
					</div>					
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table m-b-0">
									<thead>
										<tr>
											<th>SrNo</th>
											<th>First Name</th>
											<th>Last Nmae</th>
											<th>Email</th>
											<th>Password</th>
											<th>course</th>
											<th>Phone Number<th/>
											<th>Action</th>
											
											
											
											
											
										</tr>
									</thead>
									<tbody>
										
										<tr class="danger odd" role="row">
                                                <td class="mailbox-name sorting_1">1</td>
                                                <td class="mailbox-name sorting_1">Ashu</td>                                                
                                                <td class="mailbox-name sorting_1" >Rana</td>    
                                                <td class="mailbox-name sorting_1" >kljt@gmail.com</td>    
                                                <td class="mailbox-name sorting_1" >************</td>    
                                                <td class="mailbox-name sorting_1" >abc</td>    
                                                <td class="mailbox-name sorting_1" >4365347567</td>    
                                                   
                                                    
												
                                                                                              
                                                                                               
												
                                                <td class="text-right"> 
													<a class="btn btn-info" href="add-register.php?id=1"> <i class="fa fa-pencil"> </i> </a>
													<button class="btn btn-danger" onclick="deletedoctor('1','name')"> <i class="fa fa-close"> </i> </button>
												</td>           
                                              
                                                
                                            </tr>
										
																		
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
		
		</div>
		</div>
		<script>
		    function deletedoctor (pvarId, pvarName){
				var c =confirm("Are you sure you want to delete this subject("+ pvarName +") ?");
				if(c == true){
					location.href="subject-list.php?id="+ pvarId;
				}else{
					location.href="subject-list.php";
					return false;
				}
			}
			</script>
	<?php "layout/footer.php"; ?>	
