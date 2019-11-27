<?php
	session_start();
	require_once('connect.php');
	
	$shiftid = $_GET['shiftid']; 
	if(isset($shiftid)) {
		$q="DELETE FROM schedule where Shift_id=$shiftid";
		$q = strtolower($q);
			if(!$mysqli->query($q)){
				echo "DELETE failed. Error: ".$mysqli->error ;
		   }
		   $mysqli->close();
		   //redirect
		   header("Location: schedule.php");
	}
?>
