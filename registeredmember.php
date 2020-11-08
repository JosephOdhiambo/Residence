<?php
include("config.php");
  include('server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
$(document).ready(function() {

  // load messages every 1000 milliseconds from server.
  load_data = {'fetch':1};
  window.setInterval(function(){
   $.post('shout.php', load_data,  function(data) {
    $('.message_box').html(data);
    var scrolltoh = $('.message_box')[0].scrollHeight;
    $('.message_box').scrollTop(scrolltoh);
   });
  }, 1000);
  
  //method to trigger when user hits enter key
  $("#shout_message").keypress(function(evt) {
    if(evt.which == 13) {
        var iusername = $('#shout_username').val();
        var imessage = $('#shout_message').val();
        post_data = {'username':iusername, 'message':imessage};
        
        //send data to "shout.php" using jQuery $.post()
        $.post('shout.php', post_data, function(data) {
          
          //append data into messagebox with jQuery fade effect!
          $(data).hide().appendTo('.message_box').fadeIn();
  
          //keep scrolled to bottom of chat!
          var scrolltoh = $('.message_box')[0].scrollHeight;
          $('.message_box').scrollTop(scrolltoh);
          
          //reset value of message box
          $('#shout_message').val('');
          
        }).fail(function(err) { 
        
        //alert HTTP server error
        alert(err.statusText); 
        });
      }
  });
  
  //toggle hide/show shout box
  $(".close_btn").click(function (e) {
    //get CSS display state of .toggle_chat element
    var toggleState = $('.toggle_chat').css('display');
    
    //toggle show/hide chat box
    $('.toggle_chat').slideToggle();
    
    //use toggleState var to change close/open icon image
    if(toggleState == 'block')
    {
      $(".header div").attr('class', 'open_btn');
    }else{
      $(".header div").attr('class', 'close_btn');
    }
     
     
  });
});

</script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav1 {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:#842381;
   color: white;
   text-align: center;
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
      <h1>Welcome</h1>
      <script type="text/javascript">
$(document).ready(function() { 

    $('#btnSubmit').click(function() {  

        $(".error").hide();
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        var emailaddressVal = $("#email").val();
        if(emailaddressVal == '') {
            $("#email").after('<span class="error">Please enter your email address.</span>');
            hasError = true;
        }

        else if(!emailReg.test(emailaddressVal)) {
            $("#email").after('<span class="error">Enter a valid email address.</span>');
            hasError = true;
        }

        if(hasError == true) { return false; }

    });
});

</script>

       <?php
 include('config.php');
$result = mysqli_query($mysqli,"SELECT * FROM users");
?>
      <div id="tab1" class="tab_content">
  <table class="tablesorter" cellspacing="0"> 

      <thead>  <th Colspan="11">  Events Data Table </th></thead>
    <thead>
      </tr>
            <th>Check</th> 
            <th>ID</th>
              <th>User  Name</th>        
        <th>Full Names</th>
        <th>ID Number</th>        
        <th> Marital Status</th>
       <th>Phone Number</th>  
       <th>Email Adress</th>  
      
    
      </tr>
    </thead>
    <tbody>
     <?php while($row = mysqli_fetch_array($result))
    {?>

    <tr>
    <td><input type="checkbox"></td>
    <td><?Php echo $row['id']; ?></td>
    <td><?php echo $row['username']; ?></td>
   <td><?php echo $row['Fnames']; ?></td>
  <td><?php echo $row['idno']; ?></td>
    <td><?Php echo $row['maritalstatus']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['email']; ?></td>

    
   
    </tr>

  <?php }mysqli_close($mysqli);?>
</tbody>
</table>
    </div>
  
  </div>
</div>
<?php include("footer.php")
 ?> 
<?php include("chatbox.php") ?> 
</body>
</html>


