<?php
include 'init.php';
 
 
	$Password = $_POST['password'];
	$Phone = $_POST['phone'];



 	$query1 = "SELECT Password from sbUser WHERE (Phone = '".$Phone."');";

			
	$result1 = mysqli_query($con,$query1);



	if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {

    			if (password_verify($Password, $row["Password"])) {
			    echo 'valid';
			} else {
			    echo 'invalid';
			}

    }
} else {
    echo "notExist";
}
		

		
		mysqli_close($con);



?>