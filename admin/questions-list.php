<?php
include 'layout/header.php';
include 'layout/menu.php';
//include './functions.php';
global $conn;
?>

		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">List of Questions </h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="add-question.php" class="btn btn-primary rounded"><i class="fa fa-plus"></i> New Question</a>
						</div>
					</div>					
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table m-b-0">
									<thead>
										<tr>
											<th>Sr.No</th>
											<th>Question Title</th>	
											<th>Options</th>	
											<th>Right Option</th>	
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										
										<tr class="danger odd" role="row">
                                                <td class="mailbox-name sorting_1">1</td>
                                                <td class="mailbox-name sorting_1">What Operating system</td>
                                                <td class="mailbox-name sorting_1">A. OS-1 <br>
												B. OS-2<br>
												C. OS-3<br>
												D. None </td>
												<td class="mailbox-name sorting_1">Option C</td>
                                                <td class="text-right"> 
													<a class="btn btn-info" href="add-question.php?id=1"> <i class="fa fa-pencil"> </i> </a>
													<button class="btn btn-danger" onclick="deleteQuestion('1','name')"> <i class="fa fa-close"> </i> </button>
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
		    function deleteQuestion (pvarId, pvarName){
				var c =confirm("Are you sure you want to delete this question("+ pvarName +") ?");
				if(c == true){
					location.href="questions-list.php?id="+ pvarId;
				}else{
					location.href="questions-list.php";
					return false;
				}
			}
			</script>
	<?php "layout/footer.php"; ?>	
