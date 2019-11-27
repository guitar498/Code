<?php
	session_start();	
	require_once('connect.php');	
?>
<!DOCTYPE html>
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
	
	<h2>User List</h2>
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
		<form  method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
			<div class="sf">
			<label>Search by First name</label>
			<input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>">
			<button type="submit">Search</button>
			</div>
		</form>
	</div>
	<?php
	
	if(isset($_SESSION['Ut_id'])&& ($_SESSION['Ut_id']==1)){						
		echo "<form action='adduser.php' method='POST'>
		 <button type='submit'>Add user</button>  
		</form>";
	}else{				
		
		}
	?>		
	
	<div id="div_content" class="usergroup">
		<?php
		if(isset($_POST['submit'])) {
			$staffid = $_POST["staffid"];
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$gender = $_POST["gender"];
			$salary = $_POST["salary"];
			$usertype = $_POST["usertype"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			$q="INSERT INTO staff(Fname, Lname, Salary, Ut_id, Username, password, Gender)
			VALUES ('$fname','$lname','$salary','$usertype','$username','$password','$gender');";
			$result=$mysqli->query($q);
			if(!$result){
				echo "INSERT failed. Error: ".$mysqli->error ;
			}
		}
		?>
		<table>
			<col width="15%">
			<col width="15%">
			<col width="10%">
			<col width="15%">
			<col width="10%">
			<col width="15%">
			<col width="7%">
			<col width="7%">
			<tr>
				<th>Fname</th> 
				<th>LName</th>
				<th>Gender</th>
				<th>Utype</th>
				<th>salary</th>
				<th>Username</th>
				<?php
					if(isset($_SESSION['Ut_id'])&& ($_SESSION['Ut_id']==1)){						
						echo "<th>Edit</th>
						<th>Del</th>";
					}else{				
						
						}
				?>		
	
				
			</tr>
		<?php
			$q="select * from staff,gender,usertype where staff.ut_id=usertype.ut_id and staff.Gender=Gender.Gender_ID
			and Fname like'%".$strKeyword."%'";
			$q = strtolower($q);
			$result=$mysqli->query($q);
			if(!$result){
				echo "Select failed. Error: ".$mysqli->error ;
			}
			 while($row=$result->fetch_array()){ ?>
				 <tr>
					<td><?=$row['Fname']?></td> 
					<td><?=$row['Lname']?></td>
					<td><?=$row['GENDER_NAME']?></td>
					<td><?=$row['UserType']?></td>
					<td><?=$row['Salary']?></td>
					<td><?=$row['Username']?></td>
					<?php
                    if(isset($_SESSION['Ut_id'])&& ($_SESSION['Ut_id']==1)){
                        echo '<td>';?>
                             <a href="edit_user.php?staffid=<?=$row['StaffID']?>">Edit</a>
						<?php
						echo'</td>
						<td>';?>
                         <a href="del_user.php?staffid=<?=$row['StaffID']?>">Del</a>
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
</div>
</body>
</html>


