<?php
	session_start();	
	require_once('helper.php');	
	require_once('connect.php');	
?>
<!DOCTYPE html>
<html>
<head>
<title>ITS331 Sample</title>
<link rel="stylesheet" href="default.css">
</head>

<body>
<div id="wrapper"> 
	<div id="div_header">
		ITS331 System 
	</div>
	<div id="div_subhead">
	</div>
	
	<div id="div_main">
		<div id="div_menu">
			<ul id="menu">
				<li><a href="user.php">User Profile</a></li>
				<li><a href="add_user.php">Add User</a></li>
				<li><a href="group.php">User Group</a></li>
				<li><a href="add_group.php">Add User Group</a></li>
				<li><a href="logout.php">Log out</a></li>
			</ul>	
		</div>

		<div id="div_content" class="usergroup">
			<!--%%%%% Main block %%%%-->
			<?php
				if (isset($_SESSION['USER_GROUPID'])&& ($_SESSION['USER_GROUPID']==1) or ($_SESSION['USER_GROUPID']==3)){

					if(isset($_POST['page'])) {
					$title = $_POST["title"];
					$firstname = $_POST["firstname"];
					$lastname = $_POST["lastname"];
					$gender = $_POST["gender"];
					$email = $_POST["email"];
					$username = $_POST["username"];
					$passwd = $_POST["passwd"];
					$cpasswd = $_POST["cpasswd"];
					$usergroup = $_POST["usergroup"];
					$disabled = $_POST["disabled"];
					$page = $_POST['page'];

					if($page=='adduser') {
						$q="INSERT INTO user (USER_TITLE,USER_FNAME,USER_LNAME,USER_GENDER,USER_EMAIL,USER_NAME,USER_PASSWD,USER_GROUPID,DISABLE) 
						VALUES ('$title','$firstname','$lastname','$gender','$email','$username','$passwd','$usergroup','$disabled')";
						$q = strtolower($q);
						$result=$mysqli->query($q);
						if(!$result){
							echo "INSERT failed. Error: ".$mysqli->error ;
							
						}
					}
				}
					?>			
					<h2>User Profile</h2>
					<table>
						<col width="15%">
						<col width="30%">
						<col width="30%">
						<col width="20%">
						<col width="5%">

						<tr>
							<th>Title</th> 
							<th>Name</th>
							<th>Email</th>
							<th>User Group</th>
							<th>Disabled</th>
							<th>Edit</th>
							<th>Del</th>
						</tr>
				 <?php
							$q="select * from user,usergroup,title,gender where USER.USER_GROUPID=USERGROUP.USERGROUP_ID AND USER.USER_TITLE=TITLE.TITLE_ID AND
							GENDER.GENDER_ID=USER.USER_GENDER";
							$q = strtolower($q);
							$result=$mysqli->query($q);
							if(!$result){
								echo "Select failed. Error: ".$mysqli->error ;
								
							}
						 while($row=$result->fetch_array()){ ?>
							 <tr>
								<td><?=$row['TITLE_NAME']?></td> 
								<td><?=$row['USER_FNAME']?> <?=$row['USER_LNAME']?> (<?=$row['GENDER_NAME']?>)</td>
								<td><?=$row['USER_EMAIL']?></td>
								<td><?=$row['USERGROUP_NAME']?></td>
								<td><input type='checkbox' <?php if ($row['DISABLE'])	 echo "CHECKED"; echo " disabled></td>"; ?>
								<td>
									<a href="edit_user.php?userid=<?=$row['USER_ID']?>"><img src="images/Modify.png" width="24" height="24"></a>
									
								</td>
								<td><a href="del_user.php?userid=<?=$row['USER_ID']?>"> <img src="images/Delete.png" width="24" height="24"></a></td>
							</tr>                               
						<?php } ?>

					<?php $count=$result->num_rows;
							echo "<tr><td colspan=7 align=right>Total $count records</td></tr>";
							$result->free();
					?>
            </table>
			<?php
				}else{
					echo "You do not have permission to access this page!";
				}
			?>
		</div> <!-- end div_content -->
	</div> <!-- end div_main -->
	
	<div id="div_footer">  
		
	</div>
	
</div>
</body>
</html>


