<?php

include("config.php");
  include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <title>Admin HomePage</title>



</head>

<body>




  <div class="d-flex" id="wrapper">
    <?php include("topnava.html")
 ?>
    <div class="container-fluid text-center">
      <?php
 include('config.php');
$result = mysqli_query($mysqli,"SELECT * FROM users");
?>
      <div class="card-group">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"> Events Data Table </h4>
            <form  id="myForm" method="POST" action="insertcourt.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Phase Number</label>
    <input type="text" id="phaseno" class="form-control" name="phaseno" required="required">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Court Name</label>
    <input type="text" id="name" class="form-control" name="name" required="required">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Capacity</label>
    <input type="text" id="capacity" class="form-control" name="capacity" required="required">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Remarks</label>
    <input type="text" id="remarks" class="form-control" name="remarks" required="required">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function () {

      // load messages every 1000 milliseconds from server.
      load_data = {
        'fetch': 1
      };
      window.setInterval(function () {
        $.post('shout.php', load_data, function (data) {
          $('.message_box').html(data);
          var scrolltoh = $('.message_box')[0].scrollHeight;
          $('.message_box').scrollTop(scrolltoh);
        });
      }, 1000);

      //method to trigger when user hits enter key
      $("#shout_message").keypress(function (evt) {
        if (evt.which == 13) {
          var iusername = $('#shout_username').val();
          var imessage = $('#shout_message').val();
          post_data = {
            'username': iusername,
            'message': imessage
          };

          //send data to "shout.php" using jQuery $.post()
          $.post('shout.php', post_data, function (data) {

            //append data into messagebox with jQuery fade effect!
            $(data).hide().appendTo('.message_box').fadeIn();

            //keep scrolled to bottom of chat!
            var scrolltoh = $('.message_box')[0].scrollHeight;
            $('.message_box').scrollTop(scrolltoh);

            //reset value of message box
            $('#shout_message').val('');

          }).fail(function (err) {

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
        if (toggleState == 'block') {
          $(".header div").attr('class', 'open_btn');
        } else {
          $(".header div").attr('class', 'close_btn');
        }


      });
    });
  </script>
</body>

</html>