<?php
include 'layout/header.php';
include 'layout/menu.php';
include 'functions.php';
global $conn;
//for delete student
if(isset($_GET['id']) && !empty($_GET['id'])){
   $response = deleteEvent($_GET['id']);
	
	if($response['status'] == 0){
		header('Location:events.php');	
	}else{
		$responseMsg = $response['message'];
	}
}
?>

		<div class="page-wrapper" style="min-height: 328px;">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">List of Event</h4>
						</div>
						<div class="col-sm-4 text-right m-b-30">
							<a href="add-events.php" class="btn btn-primary rounded"><i class="fa fa-plus"></i> New Event</a>
						</div>
					</div>					
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table m-b-0">
									<thead>
										<tr>
											<th>SrNo</th>
											<th>Title</th>
											<th>Image</th>
											<th>Discription</th>
											<th>More Discription</th>
											<th>Start Date</th>
											<th>Time To</th>
											<th>Time From</th>
											<th>Action</th>
											
											
											
										</tr>
									</thead>
									<tbody>
										<?php 
										$eventData = getAllEvent();
										
										if(!empty($eventData)){
										$i=0;
										foreach($eventData as $value){
											$i++;
									?>
										<tr class="danger odd" role="row">
                                                <td class="mailbox-name sorting_1"><?php echo $i; ?></td>
                                                <td class="mailbox-name sorting_1"><?php echo $value['title']?></td>                                                
                                                <td class="mailbox-name sorting_1" ><?php echo $value['image']?></td>    
                                                <td class="mailbox-name sorting_1" ><?php echo $value['discription']?></td>    
                                                <td class="mailbox-name sorting_1" ><?php echo $value['more_discription']?></td>    
                                                <td class="mailbox-name sorting_1" ><?php echo $value['start_date']?></td>    
                                                <td class="mailbox-name sorting_1" ><?php echo $value['time_to']?></td>    
                                                <td class="mailbox-name sorting_1" ><?php echo $value['time_from']?></td>    
                                                    
												
                                                                                              
                                                                                               
												
                                                <td class="text-right"> 
													<a class="btn btn-info" href="add-events.php?id=<?php $value['id']?>"> <i class="fa fa-pencil"> </i> </a>
													<button class="btn btn-danger" onclick="deleteEvent('<?php echo $value['id']; ?>','<?php echo $value['title'];?>')"> <i class="fa fa-close"> </i> </button>
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
		    function deleteEvent (pvarId, pvarName){
				var c =confirm("Are you sure you want to delete this event ("+ pvarName +") ?");
				if(c == true){
					location.href="events.php?id="+ pvarId;
				}else{
					location.href="events.php";
					return false;
				}
			}
			</script>
	<?php "layout/footer.php"; ?>	
