	<?php
	session_start();	
	require_once('connect.php');
	require_once('helper.php');
		// Check login input
				$username = $_POST['username'];
				$passwd = $_POST['passwd'];
				$q = "select * from user where USER_NAME='".$username."' and USER_PASSWD='".$passwd."'";
				if($result = $mysqli->query($q)){
					if($result->num_rows == 1){
						$row = $result->fetch_array();
						$_SESSION['USER_ID'] = $row['USER_ID'];
						$_SESSION['USER_FNAME'] = $row['USER_FNAME'];
						$_SESSION['USER_LNAME'] = $row['USER_LNAME'];
						$_SESSION['DISABLE'] = $row['DISABLE'];
						$_SESSION['USER_GROUPID'] = $row['USER_GROUPID'];
					}
				}else{
					echo 'select failed: '.$mysqli->error;
				}
							
?>
<!DOCTYPE html>
<html>
<head>
<title>ITS351 Sample</title>
<link rel="stylesheet" href="default.css">
</head>

<body>
<div id="wrapper"> 
	<div id="div_header">
		ITS351 System 
	</div>
	<div id="div_subhead">
		<?php 
			//Welcome message
			if(isset($_SESSION['USER_ID'])&&isset($_SESSION['USER_GROUPID'])){
				// Specify group name
				$q = "select * from usergroup where USERGROUP_CODE='".$_SESSION['USER_GROUPID']."'";
				if($result = $mysqli->query($q)){
					if($result->num_rows == 1){
						$row = $result->fetch_array();
						$_SESSION['USERGROUP_NAME'] = $row['USERGROUP_NAME'];
					}
				}else{
					echo 'select failed: '.$mysqli->error;
				}
				// Print the welcome message on the sub-header
				echo "Welcome ".$_SESSION['USER_FNAME']." ". $_SESSION['USER_LNAME'].". You are ".$_SESSION['USERGROUP_NAME'];
			}else{
				echo "Welcome guess!";
			}		
		?>
	</div>
	 
	<div id="div_main">
		<div id="div_menu">
			<?php print_menus();?>
		</div>

		<div id="div_content" class="form">
			<!--%%%%% Main block %%%%-->
			<?php
				if(isset($_SESSION['USER_ID'])){					
					echo "Login Sucessfully!";
				}else{
					echo "Wrong Username or Password!";
				}
			?>
		</div> <!-- end div_content -->
	</div> <!-- end div_main -->
	
	<div id="div_footer">  
		
	</div>
	
</div>
</body>
</html>