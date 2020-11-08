 <?php
session_start();
include("config.php");

?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Event Booking</title>
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
    .sidenav {
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
<div id="header">
            <!-- Begin Shell -->
            <div class="shell">
               <!-- <h1 id="logo"><a class="notext" href="#" title="Suncart">Suncart</a></h1>
                <div id="top-nav">
                    <ul>
                    
                        <li><a href="contact.php"" title="contact"><span>Contact</span></a></li>
                        <li><a href="Sign In.php" title="Sign In"><span>Sign In</span></a></li>
                    </ul>
                </div>
            -->
                <div class="cl">&nbsp;</div>
    <div class="shopping-cart"  id="cart" id="right" >
<dl id="acc">   
<dt class="active">                             
<p class="shopping" >Shopping Cart &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
</dt>
<dd class="active" style="display: block;">
<?php
   //current URL of the Page. cart_update.php redirects back to this URL
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if(isset($_SESSION["cart_session"]))
{
    $total = 0;
    echo '<ul>';
    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>'."</br>";
        echo '<h3  style="color: green" ><big> '.$cart_itm["name"].' </big></h3>';
        echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> '.$cart_itm["code"].' </big></strong></div>';
        echo '<span><b><i>Shopping Cart</i></b>( <strong style="color: #d7565b" ><big> '.$cart_itm["TiradaProductTiga"].'</big></strong>) </span>';
        echo '<div class="p-price"><b><i>Price:</b></i> <strong style="color: #d7565b" ><big>'.$cart_itm["Qiimaha"].'</big></strong></div>';
        echo '</li>';
        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
    }
    echo '</ul>';
    echo '<span class="check-out-txt"><strong style="color:green" ><i>Total:</i> <big style="color:green" >'.$total.'</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Check Out</span></a></span>';
    echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">Clear Cart</span></a>';
}else{
    echo ' <h4>(Your Shopping Cart Is Empty!!!)</h4>';
}
?>

</dd>
</dl>
</div>
 <div class="clear"></div>
            </div>
            <!-- End Shell -->
        </div>
<?php include("topnav.php")
 ?> 
<div class="container-fluid text-center">    
  <div class="row content">
 <?php include("sidenav.php")?>
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

        <div id="form_wrapper" class="form_wrapper">
          <div class="customer-form">
              <div class="section group">
          
          <div class="viewcart">
  <?php
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  if(isset($_SESSION["cart_session"]))
    {
      $total = 0;
    
    echo '<form method="post" action="cart_update.php">';
    echo '<table cellspacing="0">';
        echo   '<thead>';
      echo '<tr>';
      echo '<td>Check:</td>';
      echo '<td>Product:</td>';
      echo '<td>Quantity:</td>';
     echo ' <td>Description:</td>';
      echo '<td>Price:</td>';
      echo '<td>Action:</td>';
      echo '</tr>';
      echo '</thead>';
      
    $cart_items = 0;
    foreach ($_SESSION["cart_session"] as $cart_itm)
        {
           $Product_ID  = $cart_itm["code"];
       $results = $mysqli->query("SELECT eventname,Eventlocation, eventfee FROM events  WHERE eventid='$Product_ID'"); 
          if ($results) { 
      
          
      
          //fetch results set as object and output HTML
          while($obj = $results->fetch_object())
        {
      
      
        echo '<tr class="cart-itm">';
            echo '<td><input type="checkbox"></td>';
      echo '<td><h3>'.$obj->eventname.' (Code :'.$Product_ID.')</h3></td> ';
            echo '<td class="p-qty">Qty :<input type="text" name="product_qty" value="'.$cart_itm["TiradaProductTiga"].'" size="2"   maxlength="5" /></td>';
            echo '<td>'.$obj->Eventlocation.'</td>';
        echo '<td class="p-price" style="color:green"><b>'.$obj->eventfee.'</b></td>';
      echo '<td><span class="remove-check"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span></td>';
            echo '</tr>';
      $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
      $total = ($total + $subtotal);

      

      echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->eventname.'" />';
      echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$Product_ID.'" />';
      echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->Eventlocation.'" />';
      echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["TiradaProductTiga"].'"/>';
      $cart_items ++;
                    }}}

    
    echo '<span class="midigta"><a  class="a-btn" href="products.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">Continue Shopping</span></a></span>';
    echo '<span class="check-out-txt">';

      echo '</table>';
    echo '<span> <h4 class="pricewayn"> Grand Total : <big style="color:green">'.$total.'</big> </h4></span> ';
    echo '<spa class="midigta"><a  class="a-btn" href="Somstore checkout/zaadprocess.php"><span class="a-btn-text">Proced On Zaad</span> </a></span>';
    
    echo '<span class="midigta"> <a  class="a-btn" href="Somstore checkout/process.php"> <span class="a-btn-text"> Pay On SomStore</span></a></span>';
    echo '</span>';
    echo '</form>'; 

   }else{        
    echo '<span class="wacwayn"><i>Your Cart is empty</i></span>';
  }
  
    ?>
    </div>
        </div>
        </div>
    </div>
    <?php include("sidenav2.php") ?> 
  </div>
</div>
<?php include("footer.php")
 ?> 

</body>
</html>




