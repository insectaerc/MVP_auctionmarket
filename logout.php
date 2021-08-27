<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:/MVP_auctionmarket/index.php"); //to redirect back to  MVP auction "index.php" after logging out
exit();
?>