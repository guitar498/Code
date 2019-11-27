<?php
	session_start();	
	require_once('connect.php');
				$username = $_POST['username'];
				$password = $_POST['password'];
				$q = "select * from staff where Username='".$username."' and Password='".$password."'";
				if($result = $mysqli->query($q)){
					if($result->num_rows == 1){
						$row = $result->fetch_array();
						$_SESSION['StaffID'] = $row['StaffID'];
						$_SESSION['Fname'] = $row['Fname'];
						$_SESSION['Lname'] = $row['Lname'];
						$_SESSION['Ut_id'] = $row['Ut_id'];
					}
				}else{
					echo 'select failed: '.$mysqli->error;
				}
							
?>

<!DOCTYPE html>
<html>
<head>
<title>login</title>
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
<div id="login-check" class="form">
			<?php
			
			
				if(isset($_SESSION['StaffID'])){	
					header("Location: homepage.php");		
				}else{	
					header("location:login.php?login=failed");	

				/*	echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";*/
				}
			?>
</div>




</body>
</html>
