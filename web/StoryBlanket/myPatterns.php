<?php //session

session_start();
if (!isset($_SESSION["user"])) {
	header("Location: login.php"); /* Redirect browser */
	exit();
}
$username = $_SESSION["user"];
$id = (int)$_SESSION["id"];

//browse varriables
    $name = $_GET['name'];

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
            <li><a href="addNewPattern.php">Add Pattern</a></li>
            <li class="active"><a href="myPatterns.php?name=Browse My Patterns">My Patterns</a></li>
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
                <h1><?php echo $name; ?></h1>
            </div>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-push-2">
                <label class="text-white text-inline">Browse By: </label>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="myLink" href="myPatterns.php?name=Browse My Patterns">Browse All</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="myLink dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Blanket Type</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="myPatterns.php"> All Types: A-Z</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=My Pattern Types: Z-A"> All Types: Z-A</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=My Baby Patterns"> Baby</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=My Throw Patterns"> Throw</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=My Twin Patterns"> Twin</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=My Double Patterns"> Double</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=My Queen Patterns"> Queen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=My King Patterns"> King</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=My Child Patterns"> Child</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=My Special Patterns"> Special</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="myLink dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Title</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="myPatterns.php?name=My Pattern Titles: A-Z"> All Titles: A-Z</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=My Pattern Titles: Z-A"> All Titles: Z-A</a>
                        </div>
                    </li>
                   <li class="nav-item dropdown">
                        <a class="myLink dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Time Required</a>
                        <div class="dropdown-menu">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=Time Required: 5-10 hours"> 5-10 hours</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=Time Required: 10-15 hours"> 10-15 hours</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=Time Required: 15-20 hours"> 15-20 hours</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=Time Required: 20-25 hours"> 20-25 hours</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="myPatterns.php?name=Time Required: 25-30 hours"> 25-30 hours</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-push-2">
<?php
    
    if($name == 'My Special Patterns') {
        $type = 'Special';
    } else if($name == 'My Child Patterns') {
        $type = 'Child';
    } else if($name == 'My King Patterns') {
        $type = 'King';
    } else if($name == 'My Queen Patterns') {
        $type = 'Queen';
    } else if($name == 'My Double Patterns') {
        $type = 'Double';
    } else if($name == 'My Twin Patterns') {
        $type = 'Twin';
    } else if($name == 'My Throw Patterns') {
        $type = 'Throw';
    } else if($name == 'My Baby Patterns') {
        $type = 'Baby';
    } else if($name == 'Time Required: 5-10 hours') {
        $time = '5-10 hours';
    } else if($name == 'Time Required: 10-15 hours') {
        $time = '10-15 hours';
    } else if($name == 'Time Required: 15-20 hours') {
        $time = '15-20 hours';
    } else if($name == 'Time Required: 20-25 hours') {
        $time = '20-25 hours';
    } else if($name == 'Time Required: 25-30 hours') {
        $time = '25-30 hours';
    } 
                        
    if($name == 'Browse My Patterns') {
        $stmt = $db->prepare('SELECT u.username
            ,   p.pattern_id
            ,   p.pattern_title
            ,   p.pattern_img
            ,   p.pattern_id
            ,   t.time_required
            ,   b.type 
            ,   b.size
            FROM story_blanket_user u 
            INNER JOIN pattern p 
            ON p.created_by = u.user_id 
            INNER JOIN time_required t 
            ON p.time_required = t.time_id
            INNER JOIN blanket_size b
            ON p.blanket_type = b.size_id
            INNER JOIN saved_pattern sp
            ON p.pattern_id = sp.pattern_id
            WHERE p.created_by =:user;');
       $stmt->bindValue(':user', $id, PDO::PARAM_INT);
    } else if ($name == 'My Pattern Types: A-Z') {
         $stmt = $db->prepare('SELECT u.username
         , p.pattern_title
         , p.pattern_img
         ,   p.pattern_id
         , t.time_required
         , b.type
         , b.size 
         FROM story_blanket_user u 
         INNER JOIN pattern p 
         ON p.created_by = u.user_id 
         INNER JOIN time_required t 
         ON p.time_required = t.time_id
         INNER JOIN blanket_size b
         ON p.blanket_type = b.size_id
         INNER JOIN saved_pattern sp
         ON p.pattern_id = sp.pattern_id
         WHERE p.created_by =:user
         ORDER BY b.type ASC;');
        $stmt->bindValue(':user', $id, PDO::PARAM_INT);
    } else if ($name == 'My Pattern Types: Z-A') {
         $stmt = $db->prepare('SELECT u.username
         , p.pattern_title
         , p.pattern_img
         ,   p.pattern_id
         , t.time_required
         , b.type
         , b.size 
         FROM story_blanket_user u 
         INNER JOIN pattern p 
         ON p.created_by = u.user_id 
         INNER JOIN time_required t 
         ON p.time_required = t.time_id
         INNER JOIN blanket_size b
         ON p.blanket_type = b.size_id
         INNER JOIN saved_pattern sp
         ON p.pattern_id = sp.pattern_id
         WHERE p.created_by =:user
         ORDER BY b.type DESC;');
        $stmt->bindValue(':user', $id, PDO::PARAM_INT);
    } else if ($type != "") {
        $stmt = $db->prepare('SELECT u.username
         , p.pattern_title
         , p.pattern_img
         , p.pattern_id
         , t.time_required
         , b.type
         , b.size 
         FROM story_blanket_user u 
         INNER JOIN pattern p 
         ON p.created_by = u.user_id 
         INNER JOIN time_required t 
         ON p.time_required = t.time_id
         INNER JOIN blanket_size b
         ON p.blanket_type = b.size_id
         INNER JOIN saved_pattern sp
         ON p.pattern_id = sp.pattern_id
         WHERE b.type =:type
         AND p.created_by =:user;');
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':user', $id, PDO::PARAM_INT);
    } else if ($name == 'My Pattern Titles: A-Z') {
         $stmt = $db->prepare('SELECT u.username
         , p.pattern_title
         , p.pattern_img
         , p.pattern_id
         , t.time_required
         , b.type
         , b.size 
         FROM story_blanket_user u 
         INNER JOIN pattern p 
         ON p.created_by = u.user_id 
         INNER JOIN time_required t 
         ON p.time_required = t.time_id
         INNER JOIN blanket_size b
         ON p.blanket_type = b.size_id
         INNER JOIN saved_pattern sp
         ON p.pattern_id = sp.pattern_id
         WHERE p.created_by =:user
         ORDER BY p.pattern_title ASC;');
         $stmt->bindValue(':user', $id, PDO::PARAM_INT);
    } else if ($name == 'My Pattern Titles: Z-A') {
         $stmt = $db->prepare('SELECT u.username
         ,   p.pattern_title
         ,   p.pattern_img
         ,   p.pattern_id
         ,   t.time_required
         ,   b.type 
         ,   b.size
         FROM story_blanket_user u 
         INNER JOIN pattern p 
         ON p.created_by = u.user_id 
         INNER JOIN time_required t 
         ON p.time_required = t.time_id
         INNER JOIN blanket_size b
         ON p.blanket_type = b.size_id
         INNER JOIN saved_pattern sp
         ON p.pattern_id = sp.pattern_id
         WHERE p.created_by =:user
         ORDER BY p.pattern_title DESC;');
        $stmt->bindValue(':user', $id, PDO::PARAM_INT);
    }   else if ($time != "") {
        $stmt = $db->prepare('SELECT u.username
        ,   p.pattern_title
        ,   p.pattern_img
        ,   p.pattern_id
        ,   t.time_required
        ,   b.type 
        ,   b.size
        FROM story_blanket_user u 
        INNER JOIN pattern p 
        ON p.created_by = u.user_id 
        INNER JOIN time_required t 
        ON p.time_required = t.time_id
        INNER JOIN blanket_size b
        ON p.blanket_type = b.size_id
        INNER JOIN saved_pattern sp
        ON p.pattern_id = sp.pattern_id
        WHERE t.time_required =:time
        AND p.created_by =:user;');
        $stmt->bindValue(':time', $time, PDO::PARAM_STR);
        $stmt->bindValue(':user', $id, PDO::PARAM_INT);
    }
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
    if($rows == null) {
            echo "<h3 class='text-white'>It looks like you haven't added any patterns to this catagory, please click the tab \"Add Pattern\" to create one.</h3>";
        } else {
            echo "<table class='table margin-top-10 text-white'>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Details</th>
                    </tr>";
            foreach($rows as $row) {
            $title = $row['pattern_title'];
                $username = $row['username'];
                $image = $row['pattern_img'];
                $time = $row['time_required'];
                $type = $row['type'];
                $size = $row['size'];
                $pattern_id = $row['pattern_id'];
            echo "<tr><td> $title - <br> By: $username</td>";
            echo "<td><img src='$image' width='150'></td>";
            echo "<td>Time: $time<br> Type: $type<br> Size: $size</td>"; 
            }
              echo "</table>"; 
        }
                    
?>
                   
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