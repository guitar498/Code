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
				if(isset($_SESSION['Ut_id'])&& ($_SESSION['Ut_id']==1)or ($_SESSION['Ut_id']==4) ){					
					
	?>		
  <div class="addform">
    <form action="schedule.php","addschedule" method="POST">
		<label>ShiftID</label>
		<input type="text" name="shiftid">
		<label>Staff Name</label>
		<select name="staffid">
		<?php
			if(isset($_POST['submit'])) {
			$type = $_POST["type"];
			
			/*$q='select StaffID, Fname  from staff where Ut_id>1 AND Ut_id<4;';*/
			$q='select staff.StaffID, staff.Fname,staff.Lname,usertype.UserType from 
			staff JOIN usertype on staff.ut_id=usertype.ut_id WHERE usertype.usertype="'.$type.'"';
			$q = strtolower($q);
			if($result=$mysqli->query($q)){
				while($row=$result->fetch_array()){
					echo '<option value="'.$row[0].'"> '.$row[1].' '. $row[2];
					
				}
			}else{
				echo 'Query error: '.$mysqli->error;
			}
			}
		?>
		
		</select>
		<label>Job</label>
		<?php
			if(isset($_POST['submit'])) {
			$type = $_POST["type"];
			echo'<input type="text"  name="job" value="'.$type.'" readonly>';
			}
		?>
		
		
		<label>Attraction</label>
		<select name="attraction_id">
		<?php
			$q='select AttractionID, Name  from attraction;';
			$q = strtolower($q);
			if($result=$mysqli->query($q)){
				while($row=$result->fetch_array()){
					echo '<option value="'.$row[0].'">'.$row[1];
				}
			}else{
				echo 'Query error: '.$mysqli->error;
			}
		?>
		</select>
		<label>Start</label>
		<input type="text" name="start" placeholder="00:00:00"/>
		<label>Finish</label>
		<input type="text" name="stop" placeholder="00:00:00"/>
		<?php
			if(isset($_POST['submit'])) {
				$type = $_POST["type"];
				if($type=='Mechanic'){
					echo'<label>date</label>
					<input type="text" name="date" placeholder="2019-00-00"/>';
				}
			}
		?>
		
		<label>Status</label>
		<textarea name="status" placeholder="Start/Finish"></textarea><br>

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