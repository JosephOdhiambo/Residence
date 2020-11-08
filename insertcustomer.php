<?php
   include('config.php');

$sql="INSERT INTO customers (FullName, username, Phone, emailadress, Password ) 
VALUES ('$_POST[fname]', '$_POST[uname]', '$_POST[phnnumber]', '$_POST[email]', '$_POST[pword]')";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
  header("location: indexa.php");
  echo "1 record added";

 mysqli_close($mysqli);
?> 