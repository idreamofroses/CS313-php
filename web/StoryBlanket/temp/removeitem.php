<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: login.html"); /* Redirect browser */
	exit();
}
$cart = $_SESSION["cart"];

$value = $_POST["remove"];
echo "test10";
foreach($value as $item) {
   
    if($item == "Remove Yellow Tang"){
        $key = array_search("yellowtang",$cart);
        $_SESSION["cart"][$key] = "0";
    }
    if($item == "Remove Moorish Idol"){
        $key = array_search("moorishidol",$cart);
        $_SESSION["cart"][$key] = "0";
    }
     if($item == "Remove Clownfish"){
        $key = array_search("clownfish",$cart);
        $_SESSION["cart"][$key] = "0";
    }
    if($item == "Remove Blue Tang"){
        $key = array_search("bluetang",$cart);
        $_SESSION["cart"][$key] = "0";
    }
    if($item == "Remove Cleaner Shrimp"){
        $key = array_search("cleanershrimp",$cart);
        $_SESSION["cart"][$key] = "0";
    }
    
}

header("Location: viewcart.php");
?>
