<?php 
  include("config.php");
  include('server.php');
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Residence</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */

     .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:#842381;
   color: white;
   text-align: center;
}
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: green;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<?php include("topnava.php")
 ?> 
<div class="container-fluid text-center">    
  <div class="row content">
 <?php include("sidenava.php")?>
    <div class="col-sm-8 text-left"> 
     <div class="header">
    <h2>Checking Status</h2>
  </div>

  <div id="form_wrapper" class="form_wrapper">
  
     <table>
          <form class="register active"  method="post" action="checkstatus.php">
   <?php include('errors.php'); ?>
            
    <input type="hidden" id="ID" name="ID" value="<?php echo $row['id'];?>"  placeholder="ID" required>
    <span class="error">This is an error</span>
  
   <tr>

    <td>  
 <div class="input-group">
      <label>Enter ID Number</label>
      <input type="text" name="idno" >
    </div>
  </td>
    <td>   

  <div class="input-group">
      <label>Phone Number</label>
      <input type="text" name="phnno">
    </div>
  </td>
    </tr>
   
   <tr>
    <td>   

      <td>  

   <div class="input-group">
      <button type="submit" class="btn" name="check_user">check From List</button>
    </div>
  </td>

  </form>
          
  </table>
    </div>
     
  <!--  <?php include("sidenav2.php") ?> -->
  </div>
</div>
<?php include("footer.php")
 ?> 

</body>
</html>
