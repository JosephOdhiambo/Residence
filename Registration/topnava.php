<?php
echo'
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="availphases.php">Phases</a></li>
   
        <li><a href="blacklist.php">Blacklist Status</a></li>
       
        <li><a href="check.php">Check Status</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
         <li>';
   echo "Welcome:, " . $_SESSION['username'] . "!"; 

      echo'</l1>
      </ul>
    </div>
  </div>
</nav>';
?>