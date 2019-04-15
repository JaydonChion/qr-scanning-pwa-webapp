<?php
include 'init.php';



 
	$id = $_POST['id'];



 	$query1 = "SELECT * FROM workInstance WHERE (No = '".$id."');";

			
	$result1 = mysqli_query($con,$query1);



	if (mysqli_num_rows($result1) > 0 ) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {

    
    	echo "Description: ".$row['Description']."\nRequirement: ".$row['Requirement'].";";

    }
} else {
	echo "nothing";
    
}



		mysqli_close($con);





?>