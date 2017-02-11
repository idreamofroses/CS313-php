<?php //session

session_start();
if (!isset($_SESSION["user"])) {
	header("Location: login.php"); /* Redirect browser */
	exit();
}
$username = $_SESSION["user"];
$id = (int)$_SESSION["id"];

//browse varriables
//    $name = htmlspecialchars($_GET['name']);

//database

  require("dbConnect.php");
$db = get_db();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Story Blanket - Browse</title>
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
          <a class="navbar-brand" href="browse.php?name=Browse All Patterns">Story Blanket</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="browse.php?name=Browse All Patterns" >Browse</a>
            </li>
            <li><a href="favorites.php?name=My Favorites">Favorites</a></li>
            <li class="active"><a href="addNewPattern.php">Add Pattern</a></li>
            <li><a href="myPatterns.php?name=Browse My Patterns">My Patterns</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="browse.php?name=Browse All Patterns">Welcome, <?php echo $username; ?> </a></li>
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
                                <p>If your ready to go, press "Logout" and please visit us again soon!</p>
                                <p>Otherwise, please press "Continue" and don't forget to share your blanket story with us.</p>
                            </div>
                            <div class="modal-footer">
                                <form action="endsession.php" method="post">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Continue">
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
                <h1>Add New Pattern</h1>
            </div>
        </div>

<div class="container center_div">
<div class="col-md-5 col-md-push-3">
    <div class="form-area">  
        <form action="add.php" method="post" role="form"><br>
    				<div class="form-group">
                        <label class="text-white">Pattern Title</label>
						<input type="text" class="form-control" name="title" placeholder="e.g. Animal Kingdom" required>
					</div>
					<div class="form-group">
                        <label class="text-white">Image URL</label>
						<input type="url" class="form-control" name="image" placeholder="http://" required>
					</div>
					<div class="form-group">
                        <label class="text-white">Pattern Type &amp; Size</label>
						<select class="form-control" name="size">
                            <?php 
                                $statement = $db->prepare("SELECT size_id, type, size FROM blanket_size");
                                $statement->execute();
                                $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row) {
	                               $size_id = $row['size_id'];
	                               $type = $row['type'];
	                               $size = $row['size'];
	                               echo "<option value='$size_id'>$type - $size</option>";
                                }
                            ?>
                        </select>
					</div>
					<div class="form-group">
                        <label class="text-white">Time Required</label>
						<select class="form-control" name="time">
                            <?php 
                                $statement = $db->prepare("SELECT time_id, time_required FROM time_required");
                                $statement->execute();
                                $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row) {
	                               $time_id = $row['time_id'];
	                               $time = $row['time_required'];
                                    if($time != '< 5 hours' && $time != '> 30 hours') {
	                                   echo "<option value='$time_id'>$time</option>";
                                    }
                                }
                            ?>
                        </select>
					</div>
                    <div class="form-group">
                        <label class="text-white">Story</label>
                        <textarea class="form-control" type="textarea" placeholder="Please share the story behind your pattern" maxlength="2000" rows="7"></textarea>      
                    </div>
            
                <button type="submit" class="btn pull-right">Add Pattern</button>
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