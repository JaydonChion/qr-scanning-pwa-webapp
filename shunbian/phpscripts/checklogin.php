<?php 
		session_start();
		// if(!$_SESSION['logged']==TRUE){ 
		//     header("Location: ../html/index.html"); 
		//     exit; 
		// } 
		// header("Location: ../html/userPage.html"); 
		// exit;
		echo ($_SESSION['logged']);
            ?>