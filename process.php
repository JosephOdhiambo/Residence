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
     <link rel="stylesheet" href="../css/PaymentStyle.css" type="text/css" media="screen"/>
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
      <!-- Begin Content -->
      <div id="content">
      
      <br><br>
      
              <div id="kcontent">
            <h1> Somstore Payment Method</h1>
            <div id="wwrapper">
                <div id="steps">
        
                    <form id="formElem" name="formElem"  action="InsertPayment.php" method="POST" class="myForm">
          
          
                        <fieldset class="step">
                            <legend>Account
              <?php
   //current URL of the Page. cart_update.php redirects back to this URL
  $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
if(isset($_SESSION["cart_session"]))
{
    $total = 0;
    echo '<ol>';
    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
    
        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
    }
    echo '</ol>';
     echo '<h4 Align="right">Total : <big style="color:green">'.$total.'</big></h4>';

}else{

}
?>
  
              </legend> 
                            <p>
                                <label for="username">Full Name</label>
                                <input id="fullname" name="fullname" />
                            </p>
                            <p>
                                <label for="email">Email</label>
                                <input id="email" name="email" placeholder="jananalibritish@gmail.com" type="email" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="country">Postal Code</label>
                                <input id="pcode" name="pcode" type="text" AUTOCOMPLETE=OFF />
                            </p>

                        </fieldset>
                        <fieldset class="step">

                         <legend>Personal Details
             
                                      <?php
   //current URL of the Page. cart_update.php redirects back to this URL
  $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
if(isset($_SESSION["cart_session"]))
{
    $total = 0;
    echo '<ol>';
    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
    
        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
    }
    echo '</ol>';
     echo '<h4 Align="right">Total: <big style="color:green">'.$total.'</big></h4>';

}else{

}
?>
             
             </legend>
                           <p>
                                <label for="phone"> Address:</label>
                                <input id="address" name="address" placeholder="e.g. Arabsiyo" type="text" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="country">Country</label>
                                    <select name="country" id="select">
  
      <option value="AF" countrynum="93">Afghanistan</option>
      <option value="ALA" countrynum="358">Aland Islands</option>
      <option value="AL" countrynum="355">Albania</option>
      <option value="AE" countrynum="971">United Arab Emirates</option>
      <option value="UK" countrynum="44">United Kingdom</option>
      <option value="US" countrynum="1">United States</option>
      <option value="UM" countrynum="1">United States Minor Outlying Islands</option>
      <option value="UY" countrynum="598">Uruguay</option>
      <option value="UZ" countrynum="998">Uzbekistan</option>
      <option value="VU" countrynum="678">Vanuatu</option>
      <option value="VA" countrynum="39">Vatican City State (Holy See)</option>
      <option value="VE" countrynum="58">Venezuela</option>
      <option value="VN" countrynum="84">Vietnam</option>
      <option value="VG" countrynum="1284">Virgin Islands (British)</option>
      <option value="VI" countrynum="1340">Virgin Islands (U.S.)</option>
      <option value="WF" countrynum="681">Wallis And Futuna Islands</option>
      <option value="EH" countrynum="685">Western Sahara</option>
      <option value="YE" countrynum="967">Yemen</option>
      <option value="YU" countrynum="381">Yugoslavia</option>
      <option value="ZM" countrynum="260">Zambia</option>
      <option value="EAZ" countrynum="255">Zanzibar</option>
      <option value="ZW" countrynum="263">Zimbabwe</option>
  
</select>    

                        </p>
                             <p>
                                <label for="phone"> City:</label>
                                <input id="city" name="city" placeholder="e.g. Arabsiyo" type="text" AUTOCOMPLETE=OFF />
                            </p>                             

              <p> 
                 <label for="Address"> Phone:</label>
                                <input id="phone" name="phone" placeholder="e.g. +252-63-4138440" type="tel" AUTOCOMPLETE=OFF />
                            </p>
              
                        </fieldset>
                        <fieldset class="step">
                            <legend>Payment
              
                                        <?php
   //current URL of the Page. cart_update.php redirects back to this URL
  $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
if(isset($_SESSION["cart_session"]))
{
    $total = 0;
    echo '<ol>';
    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
    
        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
    }
    echo '</ol>';
    echo '<h4 Align="right">Total: <big style="color:green">'.$total.'</big></h4>';

}else{

}
?>
              
              </legend>
              
               <p>
                                <label for="name"> Warehouse:</label>
                                 <?php
                  
                    $name= mysqli_query($mysqli,"select * from warehouse");

                    echo '<select  name="warehouse"  id="ml" class="ed">';
                    echo '<option selected="selected">Select Warehouse</option>';
                     while($res= mysqli_fetch_assoc($name))
                    {

                    echo '<option>';
                    echo $res['Warehouse_ID'];
                    echo'</option>';
                    }
                    echo'</select>';

                    ?>
                            </p>
              
              <p>
                                <label for="phone">Delivery Address</label>
                                <input id="delivery" name="delivery" placeholder="e.g. Arabsiyo" type=" text" AUTOCOMPLETE=OFF />
                            </p>

                            

<?php
   //current URL of the Page. cart_update.php redirects back to this URL
  $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
if(isset($_SESSION["cart_session"]))
{
    $total = 0;

    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
    
        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal); 
    }

    echo ' <p> <label for="Address">Total Amount:</label> <input id="paid" class="tAmount" name="Totalka"  value=" '.$currency.$total.'"  type="text"  disabled></p>';

}else{

}
?>

 </fieldset>

            <fieldset class="step">
                            <legend>Confirm
                                        <?php
   //current URL of the Page. cart_update.php redirects back to this URL
  $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
if(isset($_SESSION["cart_session"]))
{
    $total = 0;
    echo '<ol>';
    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
    
        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal) ."</br>"; 
    }
    echo '</ol>';
    echo '<h4 Align="right">Your Total Amount: <big style="color:green">'.$total.'</big></h4>';

}else{

}
?>
              </legend>
              <p>
                Remember Sir If You Proceed it Now You Can Find Your Sales Voucher Or Payment Voucher In Your Mail Box In A View Minutes.
              </p>
                            <p class="submit">
              
                                <button id="registerButton" type="submit"   name="submit"  title="Click On Payment Method"> Proceed</button>
                            </p>
                        </fieldset>
                    </form>
                </div>
                <div id="nav" style="display:none;">
                    <ul>
                        <li class="doortay">
                            <a href="#">Account</a>
                        </li>
                        <li>
                            <a href="#">Personal Details</a>
                        </li>
                        <li>
                            <a href="#">Payment</a>
                        </li>
                        <li>
                            <a href="#">Confirm</a>
                        </li>
            
                    </ul>
                </div>
            </div>
        </div>
    
    
    
 <script>
<script type="text/javascript">

$(document).ready(function(){ 
    $("#registerButton").click(function() { 
     
        $.ajax({
        cache: false,
        type: 'POST',
        url: 'InsertPayment.php',
        data: $(".myForm").serialize(),
        success: function(d) {
            $("#someElement").html(d);
        }
        });
    }); 
});

</script> 
    
      </div>
      <!-- End 
    </div>

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




