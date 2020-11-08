<?php
   include('config.php');

$sql="INSERT INTO blacklisted (name, idno, fault, userid,blacklistdate) 
VALUES ('$_POST[fname]', '$_POST[idno]', '$_POST[reason]', '$_POST[ID]','$_POST[bdate]')";
$sql1="update users set status='BLACKLISTED' where id='$_POST[ID]'";
if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
  mysqli_query($mysqli,$sql1);
  header("location: indexa.php");
  echo "1 record added";

 mysqli_close($mysqli);
?> 