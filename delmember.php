<?php
   include('config.php');


$sql="DELETE from users where id='$_GET[delete]'";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

  header("location: registeredmembers.php");
  echo "1 record added";

 mysqli_close($mysqli);
?> 