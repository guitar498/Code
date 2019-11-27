<?php
	session_start();	
	require_once('helper.php');	
	require_once('connect.php');	

if (isset($_SESSION['USER_GROUPID'])&& ($_SESSION['USER_GROUPID']==1) or ($_SESSION['USER_GROUPID']==3)){
	$userid = $_GET['userid']; // user id
	if(isset($userid)) {
		$q="DELETE FROM user where USER_ID=$userid";
		$q = strtolower($q);
			if(!$mysqli->query($q)){
				echo "DELETE failed. Error: ".$mysqli->error ;
		   }
		   $mysqli->close();
		   //redirect
		   header("Location: user.php");
	}
	}else{
		echo "You do not have permission to access this page!";
	}
?>
