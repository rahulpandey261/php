<?php
$response = array();

if (isset($_POST['tag']) && $_POST['tag'] != '') {
	    // get tag
    $tag = $_POST['tag'];
	
	
	if($tag=='splash'){
		$response["success"] = true;
		echo json_encode($response);
	}else if($tag=='login'){
		$user_name;
		$user_password;
		if ((isset($_POST['user_name']) && $_POST['user_name'] != '') &&  (isset($_POST['user_password']) && $_POST['user_password'] != '')){
			$user_name = $_POST['user_name'];
			$user_password = $_POST['user_password'];
			//fetch data from db using getUserBynumber($_POST['user_name'],$_POST['user_password
			 //create class for user_details fetching from DB
			 
			 $result = getUserBynumber($user_name,$user_password);
			 if($result){
				 $location = findLocationbyUserName($user_name);
				 $response["success"] = true;
				 $response["user_name"] = $user_name;
				 $response["user_password"] = $user_password;
		         $response["user_location"] = $location;
				 //return json {success:true,user_name:$user_name,user_location:$user_location}
			 }else{
				 $response["success"] = false;
			     $response["message"] = "Please Enter Correct Details";
				 //return json {success:false,message:Please Enter Correct Details}
			 }
			 echo json_encode($response);
		}else{
			$response["success"] = false;
			$response["message"] = "Please Enter Correct Details";
		    echo json_encode($response);
			//return json {success:false,message:Please Enter Correct Details}
		}
		//return json {success:true,user_name:$user_name,user_location:$user_location}
		
		//
	}else if($tag == 'register'){
		//insert user information by calling register_user(user_name,user_password,user_city,user_locality,user_address)
		//if inserted go to getUserBynumber(user_name,user_password)
		//return json {success:true,user_name:$user_name,user_location:$user_location}

	}
	//else case 
}
?>