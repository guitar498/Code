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
<div class="navbar">
<a href="homepage.php">Home</a>
  <a href="att.php">Attraction</a>
  <a href="user.php">User list</a>
  <a href="schedule.php">Schedule</a>
   <a href="contact.php">Contact</a>
  <div class="nav-right">
    <a href="login.php">Logout</a>
	</div>
</div>


<div class="section">
	
		<header class="major">
			<h2>Attraction</h2>
			<!-- <span class="byline">Mauris vulputate dolor sit amet nibh</span> -->
		</header>
		<div class="row">
			<div class="sec">
				<a href="#" class="image feature"><img src="images/pic04.jpg" alt=""></a>
				<p style="color:MediumSeaGreen;">On working staff</p>
				<?php
					$q = "select Fname,Lname,UserType from staff,schedule,usertype where Schedule.Staff_id=staff.StaffID and schedule.Attraction_id = 1 and 
						  schedule.Status = 'Start' and staff.Ut_id = usertype.Ut_id " ;
					$result=$mysqli->query($q);
					while ($row=$result -> fetch_array()){
						echo $row ['Fname']." ".$row['Lname'].str_repeat("&nbsp;", 10).$row['UserType'] ;
						echo "<br>" ;
					}
				
				?>
			</div>
			<div class="sec">
				<a href="#" class="image feature"><img src="images/pic02.jpg" alt=""></a>
				<p style="color:MediumSeaGreen;">On working staff</p>
				<?php
					$q = "select Fname,Lname,UserType from staff,schedule,usertype where Schedule.Staff_id=staff.StaffID and schedule.Attraction_id = 2 and 
						  schedule.Status = 'Start' and staff.Ut_id = usertype.Ut_id " ;
					$result=$mysqli->query($q);
					while ($row=$result -> fetch_array()){
						echo $row ['Fname']." ".$row['Lname'].str_repeat("&nbsp;", 10).$row['UserType'] ;
						echo "<br>" ;
					}
				
				?>
			</div>
			<div class="sec">
				<a href="#" class="image feature"><img src="images/pic05.jpg" alt=""></a>
				<p style="color:MediumSeaGreen;">On working staff</p>
				<?php
					$q = "select Fname,Lname,UserType from staff,schedule,usertype where Schedule.Staff_id=staff.StaffID and schedule.Attraction_id = 3 and 
						  schedule.Status = 'Start' and staff.Ut_id = usertype.Ut_id " ;
					$result=$mysqli->query($q);
					while ($row=$result -> fetch_array()){
						echo $row ['Fname']." ".$row['Lname'].str_repeat("&nbsp;", 10).$row['UserType'] ;
						echo "<br>" ;
					}
				
				?>
			</div>
		</div>
		
		<div class="row">
			<div class="sec">
				<a href="#" class="image feature"><img src="images/pic06.jpg" alt=""></a>
				<p style="color:MediumSeaGreen;">On working staff</p>
				<?php
					$q = "select Fname,Lname,UserType from staff,schedule,usertype where Schedule.Staff_id=staff.StaffID and schedule.Attraction_id = 4 and 
						  schedule.Status = 'Start' and staff.Ut_id = usertype.Ut_id " ;
					$result=$mysqli->query($q);
					while ($row=$result -> fetch_array()){
						echo $row ['Fname']." ".$row['Lname'].str_repeat("&nbsp;", 10).$row['UserType'] ;
						echo "<br>" ;
					}
				
				?>
			</div>
			<div class="sec">
				<a href="#" class="image feature"><img src="images/pic07.jpg" alt=""></a>
				<p style="color:MediumSeaGreen;">On working staff</p>
				<?php
					$q = "select Fname,Lname,UserType from staff,schedule,usertype where Schedule.Staff_id=staff.StaffID and schedule.Attraction_id = 5 and 
						  schedule.Status = 'Start' and staff.Ut_id = usertype.Ut_id " ;
					$result=$mysqli->query($q);
					while ($row=$result -> fetch_array()){
						echo $row ['Fname']." ".$row['Lname'].str_repeat("&nbsp;", 10).$row['UserType'] ;
						echo "<br>" ;
					}
				
				?>
			</div>
		</div>
</div>

</body>
</html>