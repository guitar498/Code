<?php
	session_start();	
	require_once('connect.php');	
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>

<div class="navbar" >
  <a href="homepage.php">Home</a>
  <a href="att.php">Attraction</a>
  <a href="user.php">User list</a>
  <a href="schedule.php">Schedule</a>
   <a href="contact.php">Contact</a>
  <div class="nav-right">
    <a href="login.php">Logout</a>
  </div>
</div>


<div class="add-page">
	<?php
				if(isset($_SESSION['Ut_id'])&& ($_SESSION['Ut_id']==1)or ($_SESSION['Ut_id']==4)){					
					
	?>		
  <div class="addform">
  <h2>Assign Schedule to </h2>
    <form action="edit_schedule.php" method="POST">
		
		<label>type</label>
		<select name="type">
		<?php
			$q='select UserType from 
			usertype WHERE Ut_id>1 AND Ut_id<4';
			$q = strtolower($q);
			if($result=$mysqli->query($q)){
				while($row=$result->fetch_array()){
					echo '<option value="'.$row[0].'"> '.$row[0];
					
				}
			}else{
				echo 'Query error: '.$mysqli->error;
			}
		
		?>
		
		</select>
		
		<button type="submit" name="submit" value="submit">submit</button>
    </form>
  </div>
  <?php
  }else{				
		echo "<script>";
        echo "alert(\" You do not have permission to access this page!\");"; 
        echo "window.history.back()";
        echo "</script>";
		}
	?>
</div>

</body>
</html>