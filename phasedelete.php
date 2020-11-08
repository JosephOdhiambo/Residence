<?php
   include('config.php');


$sql="DELETE from phase where phaseid='$_GET[delete]'";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

  header("location: Availphases.php");
  echo "1 record added";

 mysqli_close($mysqli);
?> 