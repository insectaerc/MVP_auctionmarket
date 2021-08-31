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
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<br> </br>
	<h2 align="center">Admin Login Page </h2>
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
</body>
</html>