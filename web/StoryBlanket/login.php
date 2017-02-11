<?php
    //this will need php for creating users and verifying user login info
    $status = htmlspecialchars($_GET['status']);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Story Blanket - Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- My css -->
    <link rel="stylesheet" href="css/main.css">

</head>  
<body class="bg-info bg-turk-dark body">
    
    <div class="container">
        <div class="row">
            <header class="col-xs-12 bg-turk border-dashed border-color-black">
                <h1 class="text-center text-white">Every Blanket Tells a Story</h1>
                <h3 id="story" >StoryBlanket.com</h3>
            </header>
        </div>
        
        <div class="row">
            <div class="col-sm-4 col-sm-push-4">
                <br>
                <form action="newUser.php" method="post">
                    <h2 class="form-signin-heading text-white text-inline" >Please sign in</h2>
                    <button class="btn btn-md bg-turk text-white pull-right text-inline" type="submit">New User</button>
                </form>
                <br>
                <form class="form-signin" action="authenticate.php" method="post">
                    <input type="text" id="username" name="username" class="form-control" placeholder="username" required>
                    <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
                    <br>
                    <button class="btn btn-md btn-block bg-turk text-white" type="submit">Login</button>
                </form>
                <?php
                    if($status == "unsuccesful") {
                        echo "<h3 class=\"text-center text-white\">Login Unsuccessful</h3>";
                    }
                ?>
            </div>
        </div>
    </div>
        
    
    <!-- JQUERY -->
    <script src="js/jquery.min.js"></script>
        
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>