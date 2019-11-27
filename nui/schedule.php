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



<div class="bg">
	<h2>Schedule</h2>
	
	<?php
		ini_set('display_errors', 1);
		error_reporting(~0);
		$strKeyword = null;
		if(isset($_POST["txtKeyword"]))
		{
		$strKeyword = $_POST["txtKeyword"];
		}
		?>
	<div class="search">
		<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
		<div class="sf">
			<label>Search by First name</label>
			<input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>">
			<button type="submit">Search</button>
		</div>	
		</form>
	</div>
	
	<?php
	
	if(isset($_SESSION['Ut_id'])&& ($_SESSION['Ut_id']==1)or ($_SESSION['Ut_id']==4)){						
		echo '<form action="checkschedule.php" method="POST"> 
		<button type="submit">Assign Schedule</button>  
	</form>';
	}else{				
		
		}
	?>		
	
	<div id="div_content" class="usergroup">
		<?php
		if(isset($_POST['submit'])) {
			$shiftid = $_POST["shiftid"];
			$attraction_id = $_POST["attraction_id"];
			$staffid = $_POST["staffid"];
			$start = $_POST["start"];
			$stop = $_POST["stop"];
			$date = $_POST["date"];
			$status = $_POST["status"];
			
			$q="INSERT INTO schedule(Shift_id, Attraction_id, staff_id, Status, Start_at, Fin_before ,date)
			VALUES ('$shiftid','$attraction_id','$staffid','$status','$start','$stop','$date');";
			$result=$mysqli->query($q);
			if(!$result){
				echo "INSERT failed. Error: ".$mysqli->error ;
			}
		}
		?>
		<table>
			<col width="15%">
			<col width="15%">
			<col width="18%">
			<col width="9%">
			<col width="9%">
			<col width="12%">
			<tr>
				<th>Name</th> 
				<th>Usertype</th>
				<th>Attraction</th>
				<th>Start</th>
				<th>Finish</th>
				<th>Date</th>
				<th>Status</th>
				<?php
					if(isset($_SESSION['Ut_id'])&& ($_SESSION['Ut_id']==1)){						
						echo "<th>Edit</th>
						<th>Del</th>";
					}else{				
						
						}
				?>	
			</tr>
		<?php
			$q="select * from staff,attraction,schedule,gender,usertype where staff.StaffID=schedule.Staff_id and staff.Gender=Gender.Gender_ID and
			staff.ut_id=usertype.ut_id and	attraction.AttractionID=schedule.Attraction_id 
			and Fname like'%".$strKeyword."%'" ;
			$q = strtolower($q);
			$result=$mysqli->query($q);
			if(!$result){
				echo "Select failed. Error: ".$mysqli->error ;
			}
			 while($row=$result->fetch_array()){ ?>
				 <tr>
					<td><?=$row['Fname']?> <?=$row['Lname']?> </td> 
					<td><?=$row['UserType']?></td>
					<td><?=$row['Name']?></td>
					<td><?=$row['Start_at']?></td>
					<td><?=$row['Fin_before']?></td>
					<td><?=$row['date']?></td>
					<td><?=$row['Status']?></td>
					<?php
                    if(isset($_SESSION['Ut_id'])&& ($_SESSION['Ut_id']==1)){
                        echo '<td>';?>
                             <a href="edit_schedule.php?shiftid=<?=$row['Shift_id']?>">Edit</a>
						<?php
						echo'</td>
						<td>';?>
                         <a href="del_schedule.php?shiftid=<?=$row['Shift_id']?>">Del</a>
						 <?php
						echo'</td>';
                    }else{

                        }
                    ?>
				</tr>                               
		<?php }
			$count=$result->num_rows;
			echo "<tr><td colspan=8 align=right>Total $count records</td></tr>";
			$result->free();
		?>
        </table>
	</div>
</div> 

</body>
</html>