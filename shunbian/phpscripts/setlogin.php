<?php 
 	session_start(); 
    $_SESSION['logged'] = TRUE; 

	// header("Location: checklogin.php"); // Modify to go to the page you would like 

	// header("Location: ../html/userPage.html"); // Modify to go to the page you would like 

	// exit;	
	echo "success";


?>