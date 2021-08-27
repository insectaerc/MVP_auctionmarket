<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
<?php
if($_SESSION["email"]) {
?>
Welcome <?php echo $_SESSION["email"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
<?php
}else echo "<h1>Please login first .</h1>";
?>

    <?php 
        include 'mvc/views/frontend/nav.php';
    ?>
    Admin dashboard Here
    <?php

?>
</body>

</html>