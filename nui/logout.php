<?php
// Perform logout if it is set
session_start();


		// Unset and destroy session variables
		
			session_unset();
			session_destroy();
			//echo$_SESSION['name'];		
			header("Location: login.php");
		// Logged out, return home, login part
			
	
?>