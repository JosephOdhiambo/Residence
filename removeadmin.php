<?php
   include('config.php');


$sql="UPDATE users SET role='' where id='$_GET[delete]'";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }

  header("location: addadmin.php");
  echo "1 record added";

 mysqli_close($mysqli);
?> 