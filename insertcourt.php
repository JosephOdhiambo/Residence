<?php
   include('config.php');

$sql="INSERT INTO courts (Phaseid, Courtname, Capacity,Remarks ) 
VALUES ('$_POST[phaseno]', '$_POST[name]','$_POST[capacity]', '$_POST[remarks]')";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
  header("location: indexa.php");
  echo "1 record added";

 mysqli_close($mysqli);
?> 