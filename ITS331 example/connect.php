<?php
$mysqli = new mysqli('localhost','root','','lab9');
if($mysqli->connect_errno){
  echo $mysqli->connect_errno.": ".$mysqli->connect_error;
}
   
?>
