<?php
include 'init.php';



 
	$Phone = $_POST['phone'];



 	$query1 = "SELECT No from sbUser WHERE (Phone = '".$Phone."');";

			
	$result1 = mysqli_query($con,$query1);



	if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {

    	echo $row["No"];

    }
} else {
    echo "notExist";
}



		mysqli_close($con);





?>