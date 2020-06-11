<?php

//session_start();
include 'common/common.php';
date_default_timezone_set("Asia/Calcutta");
define("TODAY", date('Y-m-d'));
define("TODAY_TIME_DATE", date('Y-m-d H:i:s'));
global $conn;
//$_SESSION['page'] = 0;
// student function here
function addupdateStudent($data){
	global $conn;
	$commonObj = new General();
	$insert_data = [];	
	$insert_data['first_name'] = $data['first_name'];	
	$insert_data['last_name'] = $data['last_name'];	
	$insert_data['email'] = $data['email'];	
	$insert_data['password'] = $data['password'];	
	$insert_data['course'] = $data['course'];	
	$insert_data['phone_number'] = $data['phone_number'];		
	// edit update data ....in short replase 
	if(isset($_GET['id']) && !empty($_GET['id'])){		
		$params = [
			'id'=> $_GET['id']
		];		
		$result = $commonObj->update('register', $insert_data, $params);
	
		if(!empty($result) && $result['status'] == 0){		
			return ['status' => 0, 'message' => 'Student detail updated successfully'];
		}else{
			if($result['status'] == 1){			
				return ['status' => 1, 'message' => 'Student detail not update'];
			}else{
				return ['status' => 1, 'message' => $result['message']];
			}	
		}//end of updated 		
	}else{		
		$result = $commonObj->insert('register', $insert_data);
	//	return $result;		
		if(!empty($result) && $result['status'] == 0){		
			return ['status' => 0, 'message' => 'Student added successfully'];
		}else{
			if($result['status'] == 1){			
				return ['status' => 1, 'message' => 'Student not saved'];
			}else{
				return ['status' => 1, 'message' => $result['message']];
			}		
		}
	}
	
    
}

function getAllStudent(){
	
 global $conn;
 $result = [];
 $i=0; 
 $query = "SELECT * FROM register where active='1' ORDER BY id DESC";
 $res = mysqli_query($conn, $query);
 while($row = mysqli_fetch_assoc($res)){
	 $result[] =  $row;
	 $i++;
 }
 return $result;
 
}

function deleteStudent($id){
	
		global $conn;
		$commonObj = new General();
		$insert_data = [];
		$insert_data['active'] = '0';
		$params = [
			'id'=> $id
		];		
		$result = $commonObj->update('register', $insert_data, $params);		
		if(!empty($result) && $result['status'] == 0){		
			return ['status' => 0, 'message' => 'Student successfully delete'];
		}else{
			if($result['status'] == 1){			
				return ['status' => 1, 'message' => 'Student not delete'];
			}else{
				return ['status' => 1, 'message' => $result['message']];
			}	
		}	
	
}

function getStudentDetail($id) {
		global $conn;
		$sql = "SELECT * FROM register WHERE id = $id and active = '1' ";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);
		return $row;
}
// end here student functions
 
//  conatct functions here all
 
 function addupdatecontact($data){
					global $conn;
					$commonObj = new General();
					$insert_data =[];
					$insert_data ['name']=$data['name'];
					$insert_data ['email']=$data['email'];
					$insert_data ['phone_number']=$data['phone_number'];
					$insert_data ['subject']=$data['subject'];

					// edit update data ....in short replase 
					if(isset($_GET['id']) && !empty($_GET['id'])){		
						$params = [
							'id'=> $_GET['id']
						];		
						$result = $commonObj->update('contact', $insert_data, $params);
					
						if(!empty($result) && $result['status'] == 0){		
							return ['status' => 0, 'message' => 'contact detail updated successfully'];
						}else{
							if($result['status'] == 1){			
								return ['status' => 1, 'message' => 'contact detail not update'];
							}else{
								return ['status' => 1, 'message' => $result['message']];
							}	
						}//end of updated 		
					}else{
				$result = $commonObj->insert('contact', $insert_data);
					
						if(!empty($result) && $result['status'] == 0){		
							return ['status' => 0, 'message' => 'Student added successfully'];
						}else{
							if($result['status'] == 1){			
								return ['status' => 1, 'message' => 'Student not saved'];
							}else{
								return ['status' => 1, 'message' => $result['message']];
							}		
						}
					}

}	

function getallcontact(){
					global $conn;
				$result = [];
				$i=0; 
				$query = "SELECT * FROM contact where active='1' ORDER BY id DESC";
				$res = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($res)){
					$result[] =  $row;
					$i++;
			    }
				return $result;

}

function getcontactDetail($id) {
		global $conn;
		$sql = "SELECT * FROM contact WHERE id = $id and active = '1' ";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);
		return $row;
}


function getDeleteContact($id){

			global $conn;
			$commonObj =  new General();
			$insert_data =[];
			$insert_data ['active']=0;
			$params=[
				'id'=> $id
			];
			$result = $commonObj->update('contact', $insert_data, $params);
			if(!empty($result) && $result ['status']  == 0 ){
				return['status'=>0,'message'=> 'contact delete successfully '];

			}else{
				if($result['status']==1){
					return ['status' => 1, 'message' => 'contact  not delete sucessfully' ];
				}else{
					return['status' => 1, 'message' => $result ["message"]];
				}
			}

}
// end here contact  functions
// start course functions here
function addupdatecourse($data){

	global $conn;
	$commonObj = new General();
	$insert_data =[];
	$insert_data ['title']=$data['title'];
	$insert_data ['discription']=$data['discription'];
	$insert_data ['fees']=$data['fees'];
	$insert_data ['image']=$data['image'];
	$insert_data ['more_discription']=$data['more_discription'];

				//File Upload Here
				if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
						
					// remove old image from folder befor editing images 
					if (isset($_GET['id']) && !empty($_GET['id'])) {
						$params = [
							'id' => $_GET['id']
						];

						$getImage = $commonObj->queryOne('course', $params);
						$oldImage = $getImage['image'];
						$imagePath = "images/uploads/" . $oldImage;
						if (file_exists($imagePath)) {
							unlink($imagePath);
						}
					} 
					// upload image
					$file_type = $_FILES['image']['type'];		
					$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));      
					$extensions= array("jpeg","jpg","png");
					
					if(in_array($file_ext,$extensions)=== false){
						return ['status' => 1, 'message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'];	
					}
					echo $_FILES["image"]["size"];
					if($_FILES["image"]["size"] > 5000000) {			
						return ['status' => 1, 'message' => 'Sorry, your file is too large greater than 5MB.'];	
					}
				
					$pieces = explode("/", $file_type);

					$data['image'] = time() . strtotime(date('Y-m-d')) . rand(0, 9) . '.' . $pieces['1'];

					$targetfolder = "images/uploads/";

					$targetfolder = $targetfolder . basename($data['image']);
					
					if (@move_uploaded_file($_FILES['image']['tmp_name'], $targetfolder)) {
						basename($_FILES['image']['name']) . " is uploaded";
					}else{
						return ['status' => 1, 'message' => 'Image did not upload!'];
					}
					
				}
				if (isset($data['image']) && !empty($data['image'])) {
					$insert_data['image'] = $data['image'];
				}
				//End file upload






	if(isset($_GET['id']) && !empty($_GET['id'])){		
		$params = [
			'id'=> $_GET['id']
		];		
		$result = $commonObj->update('course', $insert_data, $params);
	
		if(!empty($result) && $result['status'] == 0){		
			return ['status' => 0, 'message' => 'course detail updated successfully'];
		}else{
			if($result['status'] == 1){			
				return ['status' => 1, 'message' => 'course detail not update'];
			}else{
				return ['status' => 1, 'message' => $result['message']];
			}	
		}
	}
	else{
	$result = $commonObj->insert('course', $insert_data);
					
	if(!empty($result) && $result['status'] == 0){		
		return ['status' => 0, 'message' => 'course added successfully'];
	}else{
		if($result['status'] == 1){			
			return ['status' => 1, 'message' => 'course not saved'];
		}else{
			return ['status' => 1, 'message' => $result['message']];
		}		
	}
   }
}
 
function getcourse(){
	   global $conn;
				$result = [];
				$i=0; 
				$query = "SELECT * FROM course where active='1' ORDER BY id DESC";
				$res = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($res)){
					$result[] =  $row;
					$i++;
			    }
				return $result;

}

 
function getcourseDetail($id){
	global $conn;
	$sql = "SELECT * FROM course WHERE id = $id and active = '1' ";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($query);
	return $row;
}

function deletecourse($id){
	global $conn;
			$commonObj =  new General();
			$insert_data =[];
			$insert_data ['active']=0;
			$params=[
				'id'=> $id
			];
			$result = $commonObj->update('course', $insert_data, $params);
			if(!empty($result) && $result ['status']  == 0 ){
				return['status'=>0,'message'=> 'course delete successfully '];

			}else{
				if($result['status']==1){
					return ['status' => 1, 'message' => 'course  not delete sucessfully' ];
				}else{
					return['status' => 1, 'message' => $result ["message"]];
				}
			
		  }
		  


}
 
 
 function getCourseByLimit(){
	 global $conn;
				$result = [];
				$i=0; 
				$query = "SELECT * FROM course where active='1'ORDER BY id DESC  LIMIT 3 ";
				$res = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($res)){
					$result[] =  $row;
					$i++;
			    }
				return $result;
	 
	 
 }
//  end here course functions


// start Department function
 
 
 function addupdatedepartment($data){
	global $conn;
	$commonObj = new General();
	$insert_data = [];	
	$insert_data['name'] = $data['name'];		

	$insert_data['phone_number'] = $data['phone_number'];
	$insert_data['email'] = $data['email'];
	$insert_data['department'] = $data['department'];
	

		//File Upload Here
	if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
			
		// remove old image from folder befor editing images 
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$params = [
				'id' => $_GET['id']
			];

			$getImage = $commonObj->queryOne('department_heads', $params);
			$oldImage = $getImage['image'];
			$imagePath = "images/uploads/" . $oldImage;
			if (file_exists($imagePath)) {
				unlink($imagePath);
			}
		} 
		// upload image
		$file_type = $_FILES['image']['type'];		
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));      
		$extensions= array("jpeg","jpg","png");
		
		if(in_array($file_ext,$extensions)=== false){
			return ['status' => 1, 'message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'];	
		}
		echo $_FILES["image"]["size"];
		if($_FILES["image"]["size"] > 5000000) {			
			return ['status' => 1, 'message' => 'Sorry, your file is too large greater than 5MB.'];	
		}
	
		$pieces = explode("/", $file_type);

		$data['image'] = time() . strtotime(date('Y-m-d')) . rand(0, 9) . '.' . $pieces['1'];

		$targetfolder = "images/uploads/";

		$targetfolder = $targetfolder . basename($data['image']);
		
		if (@move_uploaded_file($_FILES['image']['tmp_name'], $targetfolder)) {
			basename($_FILES['image']['name']) . " is uploaded";
		}else{
			return ['status' => 1, 'message' => 'Image did not upload!'];
		}
		
			}
			if (isset($data['image']) && !empty($data['image'])) {
				$insert_data['image'] = $data['image'];
			}
		 //End file upload





					if(isset($_GET['id']) && !empty($_GET['id'])){		
						$params = [
							'id'=> $_GET['id']
						];		
						$result = $commonObj->update('department_heads', $insert_data, $params);
					
						if(!empty($result) && $result['status'] == 0){		
							return ['status' => 0, 'message' => 'department_heads detail updated successfully'];
						}else{
							if($result['status'] == 1){			
								return ['status' => 1, 'message' => 'department_heads detail not update'];
							}else{
								return ['status' => 1, 'message' => $result['message']];
							}	
						}//end of updated 		
					}else{
					$result = $commonObj->insert('department_heads', $insert_data);
					//	return $result;		
						if(!empty($result) && $result['status'] == 0){		
							return ['status' => 0, 'message' => 'department added successfully'];
						}else{
							if($result['status'] == 1){			
								return ['status' => 1, 'message' => 'department not saved'];
							}else{
								return ['status' => 1, 'message' => $result['message']];
							}		
						}


}
 
 }
 
 
 
 
 function getAllDepartment(){
	 
	 global $conn;
				$result = [];
				$i=0; 
				$query = "SELECT * FROM department_heads where active='1' ORDER BY id DESC";
				$res = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($res)){
					$result[] =  $row;
					$i++;
			    }
				return $result;
 }
 
 
 function getDepartmentDetail($id){
	 
	 global $conn;
		$sql = "SELECT * FROM department_heads WHERE id = $id and active = '1' ";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);
		return $row;
	 
	 
 }
 
 function deletedepartment($id){
	 
	 global $conn;
			$commonObj =  new General();
			$insert_data =[];
			$insert_data ['active']=0;
			$params=[
				'id'=> $id
			];
			$result = $commonObj->update('department_heads', $insert_data, $params);
			if(!empty($result) && $result ['status']  == 0 ){
				return['status'=>0,'message'=> 'department_heads delete successfully '];

			}else{
				if($result['status']==1){
					return ['status' => 1, 'message' => 'department_heads  not delete sucessfully' ];
				}else{
					return['status' => 1, 'message' => $result ["message"]];
				}
			
		  }
		  


		}
		
		
		// department functions end here
 
 
 //event function start
 
 function addupdateEvent($data){
			global $conn;
			$commonObj = new General();
			$insert_data = [];	
			$insert_data['title'] = $data['title'];	
			$insert_data['discription'] = $data['discription'];	
			$insert_data['more_discription'] = $data['more-discription'];	
			$insert_data['start_date'] = $data['start_date'];	
			$insert_data['time_to'] = $data['time_to'];	
			$insert_data['time_from'] = $data['time_from'];	 
			
	//File Upload Here
	if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
						
		// remove old image from folder befor editing images 
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$params = [
				'id' => $_GET['id']
			];

			$getImage = $commonObj->queryOne('events', $params);
			$oldImage = $getImage['image'];
			$imagePath = "images/uploads/" . $oldImage;
			if (file_exists($imagePath)) {
				unlink($imagePath);
			}
		} 
		// upload image
		$file_type = $_FILES['image']['type'];		
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));      
		$extensions= array("jpeg","jpg","png");
		
		if(in_array($file_ext,$extensions)=== false){
			return ['status' => 1, 'message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'];	
		}
		echo $_FILES["image"]["size"];
		if($_FILES["image"]["size"] > 5000000) {			
			return ['status' => 1, 'message' => 'Sorry, your file is too large greater than 5MB.'];	
		}
	
		$pieces = explode("/", $file_type);

		$data['image'] = time() . strtotime(date('Y-m-d')) . rand(0, 9) . '.' . $pieces['1'];

		$targetfolder = "images/uploads/";

		$targetfolder = $targetfolder . basename($data['image']);
		
		if (@move_uploaded_file($_FILES['image']['tmp_name'], $targetfolder)) {
			basename($_FILES['image']['name']) . " is uploaded";
		}else{
			return ['status' => 1, 'message' => 'Image did not upload!'];
		}
		
	}
	if (isset($data['image']) && !empty($data['image'])) {
		$insert_data['image'] = $data['image'];
	}
	//End file upload






			if(isset($_GET['id']) && !empty($_GET['id'])){		
				$params = [
					'id'=> $_GET['id']
				];		
				$result = $commonObj->update('events', $insert_data, $params);
			
				if(!empty($result) && $result['status'] == 0){		
					return ['status' => 0, 'message' => 'events detail updated successfully'];
				}else{
					if($result['status'] == 1){			
						return ['status' => 1, 'message' => 'events detail not update'];
					}else{
						return ['status' => 1, 'message' => $result['message']];
					}	
				}//end of updated 		
			}
			

			else{
			$result = $commonObj->insert('events', $insert_data);
			//	return $result;		
				if(!empty($result) && $result['status'] == 0){		
					return ['status' => 0, 'message' => 'events added successfully'];
				}else{
					if($result['status'] == 1){			
						return ['status' => 1, 'message' => 'events not saved'];
					}else{
						return ['status' => 1, 'message' => $result['message']];
					}		
							}				
				}
 }
 
 
 function getAllEvent(){
	  global $conn;
				$result = [];
				$i=0; 
				$query = "SELECT * FROM events where active='1' ORDER BY id DESC";
				$res = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($res)){
					$result[] =  $row;
					$i++;
			    }
				return $result;
 }
 
 
function getEventDetail($id){
	  global $conn;
		$sql = "SELECT * FROM events WHERE id = $id and active = '1' ";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);
		return $row;
}
 
 
 
 function deleteEvent($id){
	 
			global $conn;
					$commonObj =  new General();
					$insert_data =[];
					$insert_data ['active']=0;
					$params=[
						'id'=> $id
					];
					$result = $commonObj->update('events', $insert_data, $params);
					if(!empty($result) && $result ['status']  == 0 ){
						return['status'=>0,'message'=> 'events delete successfully '];

					}else{
						if($result['status']==1){
							return ['status' => 1, 'message' => 'events  not delete sucessfully' ];
						}else{
							return['status' => 1, 'message' => $result ["message"]];
						}
					
				}
		  


}
		
 
 // event function end here


 // blog function start here


 function addupdateBlog($data){
			global $conn;
			$commonObj = new General();
			$insert_data = [];	
			$insert_data['title'] = $data['title'];		
			$insert_data['discription'] = $data['discription'];
			$insert_data['more_discription'] = $data['more_discription'];
			$insert_data['date'] = $data['date'];
		
				//File Upload Here
				if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
										
					// remove old image from folder befor editing images 
					if (isset($_GET['id']) && !empty($_GET['id'])) {
						$params = [
							'id' => $_GET['id']
						];

						$getImage = $commonObj->queryOne('blog_post', $params);
						$oldImage = $getImage['image'];
						$imagePath = "images/uploads/" . $oldImage;
						if (file_exists($imagePath)) {
							unlink($imagePath);
						}
					} 
					// upload image
					$file_type = $_FILES['image']['type'];		
					$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));      
					$extensions= array("jpeg","jpg","png");
					
					if(in_array($file_ext,$extensions)=== false){
						return ['status' => 1, 'message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'];	
					}
					echo $_FILES["image"]["size"];
					if($_FILES["image"]["size"] > 5000000) {			
						return ['status' => 1, 'message' => 'Sorry, your file is too large greater than 5MB.'];	
					}

					$pieces = explode("/", $file_type);

					$data['image'] = time() . strtotime(date('Y-m-d')) . rand(0, 9) . '.' . $pieces['1'];

					$targetfolder = "images/uploads/";

					$targetfolder = $targetfolder . basename($data['image']);
					
					if (@move_uploaded_file($_FILES['image']['tmp_name'], $targetfolder)) {
						basename($_FILES['image']['name']) . " is uploaded";
					}else{
						return ['status' => 1, 'message' => 'Image did not upload!'];
					}
					
				}
				if (isset($data['image']) && !empty($data['image'])) {
					$insert_data['image'] = $data['image'];
				}
				//End file upload



			if(isset($_GET['id']) && !empty($_GET['id'])){		
				$params = [
					'id'=> $_GET['id']
				];		
				$result = $commonObj->update('blog_post', $insert_data, $params);
			
				if(!empty($result) && $result['status'] == 0){		
					return ['status' => 0, 'message' => 'blog_post detail updated successfully'];
				}else{
					if($result['status'] == 1){			
						return ['status' => 1, 'message' => 'blog_post detail not update'];
					}else{
						return ['status' => 1, 'message' => $result['message']];
					}	
				}//end of updated 		
			}
			
			else{
		$result = $commonObj->insert('blog_post', $insert_data);
			//	return $result;		
				if(!empty($result) && $result['status'] == 0){		
					return ['status' => 0, 'message' => 'blog_post added successfully'];
				}else{
					if($result['status'] == 1){			
						return ['status' => 1, 'message' => 'blog_post not saved'];
					}else{
						return ['status' => 1, 'message' => $result['message']];
					}		
				}
			}	
 
 }

 
 function getAllBlog(){
	global $conn;
			  $result = [];
			  $i=0; 
			  $query = "SELECT * FROM blog_post where active='1' ORDER BY id DESC";
			  $res = mysqli_query($conn, $query);
			  while($row = mysqli_fetch_assoc($res)){
				  $result[] =  $row;
				  $i++;
			  }
			  return $result;
}
function getBlogDetail($id){
	global $conn;
		$sql = "SELECT * FROM blog_post WHERE id = $id and active = '1' ";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);
		return $row;
}
function deleteBlog($id){
	global $conn;
					$commonObj =  new General();
					$insert_data =[];
					$insert_data ['active']=0;
					$params=[
						'id'=> $id
					];
					$result = $commonObj->update('blog_post', $insert_data, $params);
					if(!empty($result) && $result ['status']  == 0 ){
						return['status'=>0,'message'=> 'blog_post delete successfully '];

					}else{
						if($result['status']==1){
							return ['status' => 1, 'message' => 'blog_post  not delete sucessfully' ];
						}else{
							return['status' => 1, 'message' => $result ["message"]];
						}
					
				}

}
 
//  blog function end here 
// teacher function start here 
 function addupdateTeacher($data){
	global $conn;
	$commonObj = new General();
	$insert_data = [];	
	$insert_data['name'] = $data['name'];		
	$insert_data['title'] = $data['title'];	
	$insert_data['phone_number'] = $data['phone_number'];
	$insert_data['department'] = $data['department'];
	
	//File Upload Here
	if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
						
		// remove old image from folder befor editing images 
		if (isset($_GET['id']) && !empty($_GET['id'])) {
			$params = [
				'id' => $_GET['id']
			];

			$getImage = $commonObj->queryOne('teachers', $params);
			$oldImage = $getImage['image'];
			$imagePath = "images/uploads/" . $oldImage;
			if (file_exists($imagePath)) {
				unlink($imagePath);
			}
		} 
		// upload image
		$file_type = $_FILES['image']['type'];		
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));      
		$extensions= array("jpeg","jpg","png");
		
		if(in_array($file_ext,$extensions)=== false){
			return ['status' => 1, 'message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'];	
		}
		echo $_FILES["image"]["size"];
		if($_FILES["image"]["size"] > 5000000) {			
			return ['status' => 1, 'message' => 'Sorry, your file is too large greater than 5MB.'];	
		}
	
		$pieces = explode("/", $file_type);

		$data['image'] = time() . strtotime(date('Y-m-d')) . rand(0, 9) . '.' . $pieces['1'];

		$targetfolder = "images/uploads/";

		$targetfolder = $targetfolder . basename($data['image']);
		
		if (@move_uploaded_file($_FILES['image']['tmp_name'], $targetfolder)) {
			basename($_FILES['image']['name']) . " is uploaded";
		}else{
			return ['status' => 1, 'message' => 'Image did not upload!'];
			}
		
			}
			if (isset($data['image']) && !empty($data['image'])) {
				$insert_data['image'] = $data['image'];
			}
			//End file upload




				if(isset($_GET['id']) && !empty($_GET['id'])){		
					$params = [
						'id'=> $_GET['id']
					];		
					$result = $commonObj->update('teachers', $insert_data, $params);
				
					if(!empty($result) && $result['status'] == 0){		
						return ['status' => 0, 'message' => 'teachers detail updated successfully'];
					}else{
						if($result['status'] == 1){			
							return ['status' => 1, 'message' => 'teachers detail not update'];
						}else{
							return ['status' => 1, 'message' => $result['message']];
						}	
					}//end of updated 		
				}
				else{
				$result = $commonObj->insert('teachers', $insert_data);
				//	return $result;		
					if(!empty($result) && $result['status'] == 0){		
						return ['status' => 0, 'message' => 'teachers added successfully'];
					}else{
						if($result['status'] == 1){			
							return ['status' => 1, 'message' => 'teachers not saved'];
						}else{
							return ['status' => 1, 'message' => $result['message']];
						}		
					}
				
	}
}
 
 function getAllTeacher(){
	global $conn;
	$result = [];
	$i=0; 
	$query = "SELECT * FROM teachers where active='1' ORDER BY id DESC";
	$res = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($res)){
		$result[] =  $row;
		$i++;
	}
	return $result;
 }
 
 function getTeacherDetail($id){
	global $conn;
	  $sql = "SELECT * FROM teachers WHERE id = $id and active = '1' ";
	  $query = mysqli_query($conn,$sql);
	  $row = mysqli_fetch_assoc($query);
	  return $row;
}
 function deleteTeacher($id){
	 
	global $conn;
	$commonObj =  new General();
	$insert_data =[];
	$insert_data ['active']=0;
	$params=[
		'id'=> $id
	];
	$result = $commonObj->update('teachers', $insert_data, $params);
	if(!empty($result) && $result ['status']  == 0 ){
		return['status'=>0,'message'=> 'teachers delete successfully '];

	}else{
		if($result['status']==1){
			return ['status' => 1, 'message' => 'teachers  not delete sucessfully' ];
		}else{
			return['status' => 1, 'message' => $result ["message"]];
		}
	
}
 }
 
 
 //Register function  here
 function addupdateRegister($data){
	 	global $conn;
	$commonObj = new General();
	$insert_data = [];	
	$insert_data['first_name'] = $data['first_name'];	
	$insert_data['last_name'] = $data['last_name'];	
	$insert_data['email'] = $data['email'];	
	$insert_data['password'] = $data['password'];	
	$insert_data['course'] = $data['course'];	
	$insert_data['phone_number'] = $data['phone_number'];
	
	$result = $commonObj->insert('register', $insert_data);
	//	return $result;		
		if(!empty($result) && $result['status'] == 0){		
			return ['status' => 0, 'message' => 'register successfully'];
		}else{
			if($result['status'] == 1){			
				return ['status' => 1, 'message' => 'register not successfully'];
			}else{
				return ['status' => 1, 'message' => $result['message']];
			}		
		}
	
	
 }
 function login($data){
	 global $conn;
	 $email = $data['email'];
	 $pwd = $data['password'];
	 
	 $query="select * from register where email='".$email."' and password ='".$pwd."' and active='1'";
	// return $query;
	 
	 $res = mysqli_query($conn,$query);
	 $rows = mysqli_fetch_assoc($res);
	 if(!empty($rows)){		
			return ['status' => 0, 'message' => 'Login successfully', 'data'=> $rows];
		}else{
			return ['status' => 1, 'message' => 'register not successfully'];
		}
 }
 
 function applyForCourse($data){
	 global $conn;	
	 $commonObj = new General();
     $insert_data = [];
	 $insert_data['course_id'] = $data['course_id'];
	 $insert_data['course_fee'] = $data['course_fee'];
	 $insert_data['student_id'] = $_SESSION['userid'];
	 
	 
	 $query="select * from student_applied where student_id='".$_SESSION['userid']."' and course_id ='".$data['course_id']."' and active='1'";
	 $res = mysqli_query($conn,$query);
	 $rows = mysqli_num_rows($res);
	//return $query;
	 if($rows > 0){		
			return ['status' => 0, 'message' => 'Already apply for this course'];
		}else{			
			$result = $commonObj->insert('student_applied', $insert_data);
			
			if(!empty($result) && $result['status'] == 0){		
				return ['status' => 0, 'message' => 'Apply successfully'];
			}else{
				if($result['status'] == 1){			
					return ['status' => 1, 'message' => 'Apply not successfully'];
				}else{
					return ['status' => 1, 'message' => $result['message']];
				}		
			}
		}
 }
 

 ?>
 