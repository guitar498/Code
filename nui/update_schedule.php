<?php
	require_once('connect.php');
		$staffid = $_POST["staffid"];
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$salary = $_POST["salary"];
		$usertype = $_POST["usertype"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$gender = $_POST["gender"];
		
		$q = "UPDATE staff SET Fname='$fname',Lname='$lname',Salary='$salary ',
		Ut_id='$usertype ',Username='$username',password='$password',Gender='$gender' where StaffID=$staffid";
		
		if(!$mysqli->query($q)){
			echo "Update failed: ". $mysqli->error;
		}else{
			header("Location: user.php");
		}
?>