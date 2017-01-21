<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: login.html"); /* Redirect browser */
	exit();
}
$username = $_SESSION["user"];
$cart = $_SESSION["cart"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Darla's FishCart - Order Confirmation</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- My css -->
    <link rel="stylesheet" href="css/main.css">

</head>  
<body class="bg-info bg-turk-dark body">
    
        <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="browse.php">DarlasFishCart.com</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown"><a href="browse.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="clearcart.php">Browse All</a></li>
                <li><a href="clearcart.php">Clownfish</a></li>
                <li><a href="clearcart.php">Idols</a></li>
                <li><a href="clearcart.php">Invertebrates</a></li>
                <li><a href="clearcart.php">Tangs</a></li>
              </ul>
            </li>
            <li class="active"><a href="clearcart.php">View Cart</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="clearcart.php">Welcome, <?php echo $username;?> </a></li>
            <li class="active"><a href="#" data-toggle="modal" data-target="#mymodal">Logout <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <div class="modal fade" id="mymodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Are you sure you want to logout?</h3>
                            </div>
                            <div class="modal-body">
                                <p>It looks like your done shopping. If you would like to continue shopping please press "Continue Shopping" otherwise, press "Logout" and please visit us again soon!</p>
                            </div>
                            <div class="modal-footer">
                                <form action="endsession.php" method="post">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Continue Shopping">
                                    <input type="submit" class="btn btn-default" value="Logout">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
     <div class="container">

            <!-- Main component for a primary marketing message or call to action -->
            <div class="jumbotron bg-turk">
                <h1>Order Confirmation</h1>
            </div>
        </div>
       
    <div class="container">
        <div class="row">
                <div class="col-md-8 col-md-push-2">
                <form method="post" action="removeitem.php">
                    <?php
                        $cartSize = sizeof($cart);
                        $total = 0;
                        if($cartSize != 0) {
                             echo "<form action=\"checkout.php\" method=\"post\">
                                    <table class=\"table margin-top-10 text-white\">
                                        <tr>
                                            <th>Fish Type</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                        </tr>";
                            foreach($cart as $item) {
                                if($item == "yellowtang") {
                                    echo "<tr>
                                            <td>Yellow Tang</td>
                                            <td><img src=\"images/bubbles.jpg\" width=\"200\" alt=\"yellow tang fish\"></td>
                                            <td>$34.99</td>
                                        </tr>";
                                    $total += 34.99;
                                }
                                if($item == "moorishidol") {
                                    echo "<tr>
                                            <td>Moorish Idol</td>
                                            <td><img src=\"images/gill.jpg\" width=\"200\" alt=\"moorish idol fish\"></td>
                                            <td>$69.99</td>
                                        </tr>";
                                    $total += 69.99;
                                }
                                if($item == "clownfish") {
                                    echo "<tr>
                                            <td>Clownfish</td>
                                            <td><img src=\"images/nemo.jpg\" width=\"200\" alt=\"clownfish\"></td>
                                            <td>$12.49</td>
                                        </tr>";
                                    $total += 12.49;
                                }
                                if($item == "bluetang") {
                                    echo "<tr>
                                            <td>Blue Tang</td>
                                            <td><img src=\"images/dory.jpg\" width=\"200\" alt=\"blue tang fish\"></td>
                                            <td>$44.99</td>
                                        </tr>";
                                    $total += 44.99;
                                }
                                if($item == "cleanershrimp") {
                                    echo "<tr>
                                            <td>Cleaner Shrimp</td>
                                            <td><img src=\"images/jacques.jpg\" width=\"200\" alt=\"cleaner shrimp\"></td>
                                            <td>$24.99</td>
                                        </tr>";
                                    $total += 24.99;
                                }
                                
                            } //close of foreach loop
                    echo "<tr><td></td><td>Total:</td><td>\$$total</td></table>";
                      
                    $firstname = $_POST["full-name"];
                    $address1 = $_POST["address-line1"];
                    echo "<h3 class=\"text-white\">Ship To: </h3> <p class=\"text-white\">$firstname </br> $address1 </br>";
                    $address2 = $_POST["address-line2"];
                    if($address2 != "") {
                        echo "$address2 </br>";
                    }
                    $city = $_POST["city"];
                    echo "$city, ";
                    $state = $_POST["region"];
                    echo "$state ";
                    $zip = $_POST["postal-code"];
                    echo "$zip </br>";
                    $country = $_POST["country"];
                    echo "$country </p>";
                            
                    echo   "<a href=\"clearcart.php\" class=\"btn btn-default\">Continue Browsing</a>
                        <a href=\"endsession.php\" class=\"btn btn-default pull-right\">Logout</a>
                        </form>";
                        }

                    ?>
                    </form>
                </div>
        </div>
    </div>
    
     <footer>
    <div class="right">
      <a href="http://www.facebook.com">
      <img src="images/facebook.png" alt="facebook icon" height="40"/></a>
      <a href="https://plus.google.com">
      <img src="images/googleplus.png" alt="google plus icon" height="40"/></a>
      <a href="http://www.pinterest.com">
      <img src="images/pinterest.png" alt="pinterest logo" height="40"/></a>
    </div>
        
    <div class="left">
      <p id="copyright">&copy; 2016 Katherine Hobbs</p>
    </div>
  </footer>
    
    <!-- JQUERY -->
    <script src="js/jquery.min.js"></script>
        
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>