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
  <!--
  <div class="dropdown">
    <button class="dropbtn">Schedule  
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="schedule.php">attraction</a>
      <a href="#">maintenance</a>
      
    </div>
  </div> -->
   <a href="contract.php">Contact</a>
  <div class="nav-right">
    <a href="logout.php">Logout</a>
  </div>
</div>

<div class="bg2">
	<h1>Welcome
	<?php 
			//Welcome message
			if(isset($_SESSION['StaffID'])){
				// Specify group name
				$q = "select * from staff where StaffID='".$_SESSION['StaffID']."'";
				if($result = $mysqli->query($q)){
					if($result->num_rows == 1){
						$row = $result->fetch_array();
						$_SESSION['StaffID'] = $row['StaffID'];
					}
				}else{
					echo 'select failed: '.$mysqli->error;
				}
				// Print the welcome message on the sub-header
				echo $_SESSION['Fname']." ". $_SESSION['Lname']."";
			}		
	?>
	</h1>
	<?php
	if(isset($_SESSION['staff'])){
		$staff = $_SESSION['staff'];
		$fname = $user['Fame'];
		$lname = $user['Lname'];
		$usertype = $user['UserType'];
		echo " $fname $lname $usertype";
	}
	?>
</div>

<div class="section">
	
		<header class="major">
			<h2>Feature</h2>
			<!-- <span class="byline">Mauris vulputate dolor sit amet nibh</span> -->
		</header>
		<div class="row">
			<div class="sec">
				<a href="#" class="image feature"><img src="images/pic04.jpg" alt=""></a>
				<?php
				$q = "Select * from Attraction where AttractionId = '1'";
				$res=$mysqli->query($q);
				if($res){
					while($row = $res->fetch_array())
					{
						echo $row['Name'];
						echo "<br>";
						echo $row['Status'];
						
					}
				}
				
				?>
			
			</div>
			<div class="sec">
				<a href="#" class="image feature"><img src="images/pic02.jpg" width = "500" height = "400" alt=""></a>
				<?php
				$q = "Select * from Attraction where AttractionId = '2'";
				$res=$mysqli->query($q);
				if($res){
					while($row = $res->fetch_array())
					{
						echo $row['Name'];
						echo "<br>";
						echo $row['Status'];
					}
				}
				
				?>
			</div>
			<div class="sec">
				<a href="#" class="image feature"><img src="images/pic05.jpg" alt=""></a>
				<?php
				$q = "Select * from Attraction where AttractionId = '3'";
				$res=$mysqli->query($q);
				if($res){
					while($row = $res->fetch_array())
					{
						echo $row['Name'];
						echo "<br>";
						echo $row['Status'];
					}
				}
				
				?>
			</div>
		</div>
	



	<div class="row">
		<div class="sec">
				<a href="#" class="image feature"><img src="images/pic06.jpg" width = "500" height = "400" alt=""></a>
				<?php
				$q = "Select * from Attraction where AttractionId = '4'";
				$res=$mysqli->query($q);
				if($res){
					while($row = $res->fetch_array())
					{
						echo $row['Name'];
						echo "<br>";
						echo $row['Status'];
					}
				}
				
				?>
			</div>
			<div class="sec">
				<a href="#" class="image feature"><img src="images/pic07.jpg" alt=""></a>
				<?php
				$q = "Select * from Attraction where AttractionId = '5'";
				$res=$mysqli->query($q);
				if($res){
					while($row = $res->fetch_array())
					{
						echo $row['Name'];
						echo "<br>";
						echo $row['Status'];
					}
				}
				
				?>
			</div>
	</div>
</div>
</body>
</html>