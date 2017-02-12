<?php

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
    </div>
        
<div class="container center_div">
<div class="col-md-5 col-md-push-3">
    <div class="form-area">  
        <form action="createNewUser.php" method="post" role="form"><br>
    				<div class="form-group">
                        <label class="text-white">Full Name</label>
						<input type="text" class="form-control" name="fullname" required>
					</div>
                    <div class="form-group">
                        <label class="text-white">Username</label>
						<input type="text" class="form-control" name="username" required>
					</div>
                    <div class="form-group">
                        <label class="text-white">Password</label>
						<input type="password" class="form-control" name="password" required>
					</div>
					<div class="form-group">
                        <label class="text-white">Email</label>
						<input type="email" class="form-control" name="email" required>
					</div>
            
                <button type="submit" class="btn pull-right">Sign-Up</button>
        </form>
    </div>
</div>
</div>    
    
    <!-- JQUERY -->
    <script src="js/jquery.min.js"></script>
        
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>