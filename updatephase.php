<?php
   include('config.php');


$sql="UPDATE phase set phaseno='$_POST[phaseno]',Name='$_POST[name]',location='$_POST[location]' where phaseid='$_POST[ID]'";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

  header("location: Availphases.php");
  echo "1 record added";

 mysqli_close($mysqli);
?> 