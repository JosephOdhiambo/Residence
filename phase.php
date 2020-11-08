<?php

include("config.php");
  include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Blacklisted Individuals</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="all" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php include("topnav.html")
 ?>
  <div id="content" class="p-4 p-md-5 pt-5">
    <div class="card-group">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">Blacklisted Individuals</h1>
          <table class="table table-striped table-inverse table-responsive-lg">
            <?php
include("config.php");
$result = mysqli_query($mysqli,"SELECT * FROM Phase");
?>
            <thead class="thead-inverse">
              <tr>
                <th>Check</th>
                <th>Phase id</th>
                <th>Phase Number</th>
                <th>Phase Name</th>
                <th>Location</th>

              </tr>
            </thead>
            <tbody>
              <?php while($row = mysqli_fetch_array($result))
  {?>

              <tr>
                <td><input type="checkbox"></td>
                <td>
                  <?Php echo $row['phaseid']; ?>
                </td>
                <td><?php echo $row['Phaseno']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['location']; ?></td>

              </tr>

              <?php }mysqli_close($mysqli);?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="card-group">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-4">Sidebar #04</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>
        </div>
      </div>
    </div>

  </div>
  <?php include("chatbox.html") ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
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