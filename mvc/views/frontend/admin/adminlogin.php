<?php
    require 'mvc/views/frontend/navadmin.php';
    ?>

<?php
        //echo "This is Button1 that is selected";
        $controller = AdminController::$instance;
        if (isset($_POST['adminlogin'])) {
            $controller::$instance->check_admin();
        }
        ?>

<!-- Admin Login form -->
<!DOCTYPE html>
<html lang="en">
<style>

.form{
	background-color: white;
        width: 400px;
        height: 400px;
        margin: 3em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14)
}

</style>
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body style="background-color:floralwhite" >
	
	<div class="form">
	<br> </br>
	<h2 align="center" style="color :inkwell">Admin Login Page </h2>
	<br> </br>
	<div class="container">
	<div class="form-group text-center"  >
		<form action="" method="POST">
		<label>Email</label>
		<input type="text" name="email" placeholder="Email" class="form-control"><br>
		<label>Password</label>
		<input type="password" name="password" placeholder="password" class="form-control"><br>
		<input type="submit" name="adminlogin" class="btn btn-primary" value="Login">
		</form>
	</div>
	</div>
	</div>
</body>
</html>