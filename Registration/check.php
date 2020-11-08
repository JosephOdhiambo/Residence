<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Blacklisted List</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Checking Status</h2>
  </div>
   
  <form method="post" action="check.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Enter ID Number</label>
      <input type="text" name="idno" >
    </div>
    <div class="input-group">
      <label>Phone Number</label>
      <input type="text" name="phnno">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="check_user">check From List</button>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>
</body>
</html>