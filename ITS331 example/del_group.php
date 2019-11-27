<?php
	session_start();	
	require_once('helper.php');	
	require_once('connect.php');	
	
	if (isset($_SESSION['USER_GROUPID'])&& ($_SESSION['USER_GROUPID']==1) or ($_SESSION['USER_GROUPID']==2)){
	$id = $_GET['id']; // group id
	require_once('connect.php');
	if (isset($id)) {
		$q="DELETE FROM usergroup where USERGROUP_ID=$id";
		$q = strtolower($q);
		if(!$mysqli->query($q)){
			echo "DELETE failed. Error: ".$mysqli->error ;
	   }
	   $mysqli->close();
	   //redirect
	   header("Location: group.php");
	} 
	}else{
		echo "You do not have permission to access this page!";
	}
?>
