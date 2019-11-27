<?php 
	session_start(); 
	require_once('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>login</title>
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
<div class="navbar">
  <a href="login.php">Home</a>
  <a href="guesscontact.php">Contact</a>
  <!--
  <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> -->
</div>

<div class="pbg">
<div class="login-page">
  <div class="form">
   <!-- <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>-->
    <form class="login-form" action="checklogin.php" method="POST">
      <input type="text" name="username" placeholder="username"/>
      <input type="password"  name="password" placeholder="password"/>
      <button type="submit">login</button>
	  <?php
	  if (isset($_GET["login"]) && $_GET["login"] == 'failed') {
	  echo '<p class = warn>Wrong Username or Password!</p>';
	  }
	  ?>
      <p class="message"> <a href="forgot.php">Forgot password?</a></p>
    </form>
  </div>
</div>
</div>

</body>
</html>