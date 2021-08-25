
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="mvc/views/frontend/style.css" rel="stylesheet" type="text/css">
    <title>Customers</title>
</head>

<body>

<?php
    require 'mvc/views/frontend/nav.php';
?>

<div class="container" >
    <div class="form-container">
        <div class= "signin">

        <?php
        //echo "This is Button1 that is selected";
        $controller = CustomerController::$instance;
        if (isset($_POST['btn_submit'])) {
            $controller::$instance->check_user();
        }
        ?>

        <form action="" method = "post" class="sign-in-form">
         <h1> Sign in </h1> 
         <p>Please fill in this form to log in.</p>
         <hr>
            <label for="uname" class="form-label mt-4" > Username </label>
            <input type="text" class="form-control"  placeholder="Enter username" name ="username"required>
                
            <label for="psw" class="form-label mt-4" > Password </label>
            <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
            <label>
            <br> </br>
            <input type="checkbox" class="form-check-input" checked="checked" name="remember"> Remember me
            </label>  
            <br> </br>
            <a href="#">Forgot Your Password</a>
        <hr>       
             <button type="submit" id ="sign-in-button" class="btn btn-primary">Sign in</button> 
            </form>
            </div>
    </div>
</div>

<?php
        //echo "This is Button1 that is selected";
        $controller = CustomerController::$instance;
        if (isset($_POST['btn_register'])) {
        $controller::$instance->add_user(); }
?>

    <div class="register">
        <form action="" method = "post" class="register-form">
        <h1> Register </h1> 
        <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="email" class="form-label mt-4"><b>Email</b></label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required>
        
            <label for="phone" class="form-label mt-4"><b>Phone</b></label>
            <input type="tel" class="form-control" placeholder="Enter Phone Number" name="phone" id="phone" required>
            
            <label for="psw" class="form-label mt-4" ><b>Password</b></label>
            <input type="password" class="form-control" placeholder="Enter Password" name="psw" id="psw" required>
            
            <label for="psw-repeat" class="form-label mt-4" ><b>Repeat Password</b></label>
            <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
           
            <label for="firstName" class="form-label mt-4" ><b>First Name</b></label>
            <input type="text" class="form-control" placeholder="Enter first name" name="firstName" id="firstName" required>
           
            <label for="lastName" class="form-label mt-4" ><b>Last Name</b></label>
            <input type="text" class="form-control" placeholder="Enter last name" name="lastName" id="lastName" required>
        
            <label for="city" class="form-label mt-4" ><b>City</b></label>
            <input type="text" class="form-control" placeholder="Enter city" name="city" id="city" required>
        
                <label for="country" class="form-label mt-4" ><b>Country</b></label>
                <input type="text" class="form-control" placeholder="Enter country" name="country" id="country" required>
                
                <label for="nationalId" class="form-label mt-4" ><b>National Id</b></label>
                <input type="text" class="form-control" placeholder="Enter National Id" name="nationalId" id="nationalId" required>
                
                <label for="branch" class="form-label mt-4" >Branch:</label>
                <select id="branch" name="branch">
                    <option value="B1">B1 West Branch</option>
                    <option value="B2">B2 East Branch</option> 
                    <option value="B3">B3 South Branch</option>     
                    <option value="B4">B4 North Branch</option>                    
                </select>
                &nbsp;
                <label for="gender" class="form-label mt-4" >Gender:</label>
                <select id="gender" name="gender">
                    <option value="M">Male</option>
                    <option value="F">Female</option>                
                </select>
                <hr>
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                <button type="submit" class="btn btn-primary" name = "btn_register">Register</button>
            </form> 
    </div>

</div> 

</body>

</html>
