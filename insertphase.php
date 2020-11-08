<?php
   include('config.php');


$sql="INSERT INTO phase (phaseno, Name, location ) 
VALUES ('$_POST[phaseno]', '$_POST[name]', '$_POST[location]')";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

  header("location: indexa.php");
  echo "1 record added";

 mysqli_close($mysqli);
?> 