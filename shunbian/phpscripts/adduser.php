<?php
$response = array();
include 'init.php';
 
 
	$Name = $_POST['name'];
	$Password = $_POST['password'];
	$NRIC = $_POST['nric'];
	$Phone = $_POST['phone'];


	$options = [
    'cost' => 11,
	];
// Get the password from post

	$hash = password_hash($Password, PASSWORD_BCRYPT, $options);





	$query1 = "SELECT * from sbUser WHERE (Phone = '".$Phone."');";

 	// $query2 = "INSERT INTO sbUser (Name,Password,Phone,NRIC) VALUES('".$Name."','".$Password."','".$Phone."','".$NRIC."');";

 	$query2 = "INSERT INTO sbUser (Name,Password,Phone,NRIC) VALUES('".$Name."','".$hash."','".$Phone."','".$NRIC."');";

			
	// $query2 = "INSERT INTO sbUser (Name,Password,Phone,NRIC) VALUES('".$Name."','".$hashedPW."','".$Phone."','".$NRIC."');";
	$result1 = mysqli_query($con,$query1);
		
	if(!(mysqli_num_rows($result1)>0)){
	
	
			$result2 = mysqli_query($con,$query2);
			
			
			if(!$result2){
			
			// $response = array();
	  //   	$code = "add_fail";
	  //   	$message = "Something wrong";
	  //   	array_push($response,array("code"=>$code,"message"=>$message));
	  //   	echo json_encode(array("server_response"=>$response));
			echo ("failed");
			
			}else{
			
			// $response = array();
	  //   	$code = "add_success";
	  //   	$message = "Serial number has been added";
	  //   	array_push($response,array("code"=>$code,"message"=>$message));
	    	//echo json_encode(array("server_response"=>$response));
			
			echo ("success");
			
			}

		
	}else{
	
			$response = array();
	    	$code = "add_fail";
	    	$message = "User already exist";
	    	array_push($response,array("code"=>$code,"message"=>$message));
	    	//echo json_encode(array("server_response"=>$response));	
	    	echo ("exist");	
	}
		
		
		mysqli_close($con);

//echo json_encode($response);
?>