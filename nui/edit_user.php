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
				if(isset($_SESSION['Ut_id'])&& ($_SESSION['Ut_id']==1) ){					
					
	?>	
  <div class="addform">
    <?php
				$staffid = $_GET['staffid'];
				$q = "select * from staff where StaffID=$staffid";
				$result = $mysqli->query($q);
				if(!$result){
					echo "Select failed: ".$mysqli->error;
				}
				$urow = $result->fetch_array();
	?>
    <form action="update_user.php" method="POST">
		<label>StaffID</label>
		<input type="text" name="staffid" value="<?=$staffid?>" readonly>
		<label>Firstname</label>
		<input type="text" name="fname" value="<?=$urow['Fname']?>">
		<label>Lastname</label>
		<input type="text" name="lname" value="<?=$urow['Lname']?>">
		<label>Gender</label>
		<select name="gender">
		<?php
			$q='select GENDER_ID, GENDER_NAME from gender;';	
			if($result=$mysqli->query($q)){
				while($row=$result->fetch_array()){
					if($row['GENDER_ID']==$urow['Gender']){
						$check = 'checked';
					}else{
						$check = '';
					}
					echo '<option value="'.$row[0].'" '.$check.'>'.$row[1];
				}
			}else{
				echo 'Query error: '.$mysqli->error;
			}
		?>
		</select>
		<label>Salary</label>
		<input type="text" name="salary" value="<?=$urow['Salary']?>">
		<label>Usertype</label>
		<select name="usertype">
		<?php
			$q='select Ut_ID, UserType from usertype;';	
			if($result=$mysqli->query($q)){
				while($row=$result->fetch_array()){
					if($row['Ut_ID']==$urow['Ut_id']){
						$check = 'checked';
					}else{
						$check = '';
					}
					echo '<option value="'.$row[0].'" '.$check.'>'.$row[1];
				}
			}else{
				echo 'Query error: '.$mysqli->error;
			}
		?>
		</select>
		<label>Username</label>
		<input type="text" name="username" value="<?=$urow['Username']?>">
		<button type="submit" value="submit">Submit</button>
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


