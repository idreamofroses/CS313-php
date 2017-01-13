<?php 
  $to = "idreamofroses@gmail.com";
  $name = $_GET["name"];
  $from = $_GET["from"];
  $subject = $_GET["subject"];
  $message = $_GET["message"];
  mail($to, $subject, $message);
?>

<html>
<head>
    <title>Katherine Hobbs's Home Page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="home.css">
    <script src="home.js"></script>
</head>
<body>
  <header>
        <h1>Katherine Hobbs</h1>
        <h3>Software Engineer</h3>
            <nav>
                <a href="home.html" onmouseover="makeBigger('home');" id="home" onmouseout="makeSmaller('home');">Home</a>
                <a href="aboutme.html" id="aboutMe" onmouseover="makeBigger('aboutme');" onmouseout="makeSmaller('aboutme');">About Me</a>
                <a href="assignments.html" id="assign" onmouseover="makeBigger('assign');" onmouseout="makeSmaller('assign');">Assignments</a>
                <a href="contact.html" id="contact" onmouseover="makeBigger('contact');" onmouseout="makeSmaller('contact');">Contact Me</a>
            </nav>
    </header>
    <div>
        <p> Message sent to: <?php echo "Katherine Hobbs"; ?> </p>
        <p> From: <?php echo "$name"; ?> </p>
    </div>
    <footer>
        <div class="right">
        <a href="http://www.facebook.com"><img src="/images/facebook.png" alt="facebook icon" height="40"/></a>
        <a href="https://plus.google.com"><img src="/images/googleplus.png" alt="google plus icon" height="40"/></a>
        <a href="http://www.pinterest.com"><img src="/images/pinterest.png" alt="pinterest logo" height="40"/></a>
        </div>

        <div class="left">
        <p id="copyright">&copy; 2017 Katherine Hobbs</p>
        </div>
    </footer>
</body>
</html>

