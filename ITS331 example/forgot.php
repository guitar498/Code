<?php
require_once('connect.php');
?>
<!DOCTYPE html>
<html>
<body>
	<form name="login" method="post" action="forgot_password.php">
		Username: <input type="text" name="username" size="20"><br>
		<input type="submit" name="submit" value="submit">
		<input type="reset" name="reset" value="reset">
	</form>
	
	<?php
	// Take the username and search in userdata table if found him/her, give them the password
	
	if (isset($_POST['submit'])){
		$username =$_POST['username'];
		
		$q="select * from userdata where username='".$username."'" ;
		
		$result = $mysqli->query($q);
		if (!$result){
			die('Error: '.$q." ". $mysqli->error );
		}
		
		$count = $result->num_rows;
		
		if($count==1){
			
			// without using hash pass method
			/*
				$row = $result->fetch_array();
				$password = $row["password"];
				echo "your password is ".$password."<br>";
			*/
			
			 //with md5(pass)
			   // Assign a new pass
				$passwd='123';
			   // Hass this pass
				$password=MD5($passwd);				
			   // Update this pass to the data table
			   
				$q="update userdata set password ='".$password."'
								where username='".$username."'" ;
								
				//Show the new pass to user
				
				if ($mysqli->query($q)){
					echo "Your password is reset to $passwd";
				}else{
					die('updating password failed: ' .$mysqli->error);
				}	
			
		}else{
			echo "No such username in the system. please try again!";
		}
	}
	// Show url to go back to login page!
	echo'<a href="login.php"> Back to login page';

	?>
</body>
</html>