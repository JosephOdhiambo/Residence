<?php

include("config.php");
  include('server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Courts</title>
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
    .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:#842381;
   color: white;
   text-align: center;
}
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
 
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
 <?php include("sidenavaa.php")?>
    <div class="col-sm-8 text-left"> 
      <h1>Register Phase</h1>
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

<div id="form_wrapper" class="form_wrapper">
  <div class="customer-form">
		<form  id="myForm" method="POST" action="insertcourt.php">
    <table>

 <tr><td>
		<div>
			<span>
				<label>Phase Number</label>
			</span>
			<span>
				<input type="text" id="phaseno" name="phaseno" required="required">
			</span>
		</div>
		</td>	
    <td>
		<div>
			<span>
				<label>Court  Name</label>
			</span>
			<span>
				<input type="text" id="name" name="name" required="required">
			</span>
		</div>
		</td>
</tr>
<tr>
    <td>
		<div>
			<span>
				<label>capacity</label>
			</span>
			<span>
				<input type="text" id="capacity" name="capacity" required="required">
			</span>
		</div>
			 </td> 
    <td>	
		<div>
      <span>
        <label>Remarks</label>
      </span>
      <span>
  <input type="text" id="remarks" name="remarks" required="required">
      </span>
		</div>
			 </td> 
       </tr>
<tr>
<td></td>
   <td> 
    <div>
      <span><input type="submit" name=""></span>
    </div>
       </td> 
</tr>
			   </table>		
		</form>
</div>
</div>

    </div>
    <?php include("sidenav2.php") ?> 
  </div>
</div>
<?php include("footer.php") ?> 
<?php include("chatbox.php") ?> 
</body>
</html>

