<?php
   include('config.php');

$sql="INSERT INTO Events (Eventcategoryid, Eventlocation, eventname, eventfee,eventcapacity,Eventdate,picture) 
VALUES ('$_POST[Category]', '$_POST[Location]', '$_POST[ename]', '$_POST[Fee]', '$_POST[Capacity]', '$_POST[edate]', '$_POST[picture]')";

if (!mysqli_query($mysqli,$sql))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
  header("location: index.php");
  echo "1 record added";

 mysqli_close($mysqli);
?> 