<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
</head>

<body>
    <?php
    require 'mvc\views\frontend\nav.html';
    ?>
    <div class="card border-light text-dark mb-3 mx-4">
        <div class="card-header text-danger h2"> Customer Login/ Signup </div>
        <?php
        //echo "This is Button1 that is selected";
        $controller = CustomerController::$instance;
        if (isset($_POST['btn_submit'])) {
            $controller::$instance->check_user();
        }
        ?>

        <form method="post">

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <input name="btn_submit" type="submit">Login</input>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>

        <?php
        //echo "This is Button1 that is selected";
        $controller = CustomerController::$instance;
        if (isset($_POST['btn_register'])) {
            $controller::$instance->add_user();
        }
        ?>
        <form method="post">
            <div class="container">
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" id="email" required>
                <br/>
                <br/>
                <label for="phone"><b>Phone</b></label>
                <input type="tel" placeholder="Enter Phone Number" name="phone" id="phone" required>
                <br/>
                <br/>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
                <br/>
                <br/>
                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                <br/>
                <br/>
                <label for="firstName"><b>First Name</b></label>
                <input type="text" placeholder="Enter first name" name="firstName" id="firstName" required>
                <br/>
                <br/>
                <label for="lastName"><b>Last Name</b></label>
                <input type="text" placeholder="Enter last name" name="lastName" id="lastName" required>
                <br/>
                <br/>
                <label for="city"><b>City</b></label>
                <input type="text" placeholder="Enter city" name="city" id="city" required>
                <br/>
                <br/>
                <label for="country"><b>Country</b></label>
                <input type="text" placeholder="Enter country" name="country" id="country" required>
                <br/>
                <br/>
                <label for="nationalId"><b>National Id</b></label>
                <input type="text" placeholder="Enter National Id" name="nationalId" id="nationalId" required>
                <br/>
                <br/>
                <label for="branch">Branch:</label>
                <select id="branch" name="branch">
                    <option value="B1">B1 West Branch</option>
                    <option value="B2">B2 East Branch</option> 
                    <option value="B3">B3 South Branch</option>     
                    <option value="B4">B4 North Branch</option>                    
                </select>
                <br/>
                <br/>
                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="M">Male</option>
                    <option value="F">Female</option>                
                </select>
                <hr>

                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                <button type="submit" class="registerbtn" name = "btn_register">Register</button>
            </div>

            <div class="container signin">
                <p>Already have an account? <a href="#">Sign in</a>.</p>
            </div>
        </form>
    </div>
    </div>
</body>

</html>