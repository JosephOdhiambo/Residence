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
    .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:#842381;
   color: white;
   text-align: center;
}
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

<?php include("topnav.php")
 ?> 
<div class="container-fluid text-center">    
  <div class="row content">
 <?php include("sidenava.php")?>
    <div class="col-sm-8 text-left"> 
      <h1>Welcome</h1>
    

<?php
$update=$_GET['update'];
$result = mysqli_query($mysqli,"SELECT * FROM users  where id ='$update'");
?>
<?php if($row = mysqli_fetch_array($result))
  {?> 
  
	
	<div id="form_wrapper" class="form_wrapper">
	
		 <table>
					<form class="register active" action="insertblacklist.php" method="POST" autocomplete="off">

				
						
		<input type="hidden" id="ID" name="ID" value="<?php echo $row['id'];?>"  placeholder="ID" required>
		<span class="error">This is an error</span>
	
   <tr>

    <td>  

	  <label>Full Name:</label>
		
		<input type="text" id="fname" name="fname" value="<?php echo $row['Fnames'];?>" readonly=""  placeholder="Full name" >
		<span class="error">This is an error</span>
	</td>
    <td>   

	<label>Email Adress:</label>

		<input type="text" id="cname" name="cname" value="<?php echo $row['email'];?>" readonly=""  placeholder="User name" >
		<span class="error">This is an error</span>
	</td>
	  </tr>
   
   <tr>
    <td>   

	<label>ID Number</label>

		<input type="text" id="idno" name="idno" value="<?php echo $row['idno'];?>" readonly=""  placeholder="User name" >
		<span class="error">This is an error</span>
   </td>

      <td>  

	  <label>Reason For blacklisting</label>
		
		<input type="text" id="reason" name="reason"   placeholder="Reason " required>
		<span class="error">This is an error</span>
	</td>
	</tr>
	<tr>
   <td>   
<label>Blacklist Date</label>
<input type="Date" name="bdate">
   </td>
     <td>   


	<input type="submit" id="sbmtbutton" name="sbmtbutton"  value="blacklist Individual">
	<span class="error">This is an error</span>
		

   </td>

   </tr>
   
   
  

	</form>
					
	</table>
    </div>
       <?php }?>
 
  </div>
</div>
<?php include("footer.php")
 ?> 
<?php include("chatbox.php") ?> 
</body>
</html>
