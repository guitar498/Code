<?php
	session_start();
	require_once('connect.php');
	
	$staffid = $_GET['staffid']; 
	if(isset($staffid)) {
		$q="DELETE FROM staff where StaffID=$staffid";
		$q = strtolower($q);
			if(!$mysqli->query($q)){
				echo "DELETE failed. Error: ".$mysqli->error ;
		   }
		   $mysqli->close();
		   //redirect
		   header("Location: user.php");
	}
?>
