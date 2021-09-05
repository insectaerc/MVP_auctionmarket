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

    <div class="container">
        <div class="form-container">
            <div class="signin">

                <form method="post" class="sign-in-form">
                    <h1> Sign in </h1>
                    <p>Please fill in this form to log in.</p>
                    <hr>
                    <?php
                    //echo "This is Button1 that is selected";
                    $controller = CustomerController::$instance;
                    if (isset($_POST['btn_submit'])) {
                        $controller::$instance->check_user();
                    }
                    ?>
                    <label for="uname" class="form-label mt-4"> Username </label>
                    <input type="text" class="form-control" placeholder="Enter username" name="username" required>

                    <label for="psw" class="form-label mt-4"> Password </label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                    <label>
                        <br> </br>
                        <input type="checkbox" class="form-check-input" checked="checked" name="remember"> Remember me
                    </label>
                    <br> </br>
                    <a href="#">Forgot Your Password</a>
                    <hr>
                    <button name="btn_submit" type="submit" id="sign-in-button" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    //echo "This is Button1 that is selected";
    $controller = CustomerController::$instance;
    if (isset($_POST['btn_register'])) {
        $controller::$instance->add_user();
    }
    function isset_file($file)
    {
        return (isset($file) && $file['error'] != UPLOAD_ERR_NO_FILE);
    }

    function uploadImage($id)
    {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        if (!isset_file($_FILES['avatar'])) {
            // It's not empty
            echo "<div class='alert alert-dismissible alert-warning mt-5'>";
            echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
            echo "<h4 class='alert-heading'>We are sorry!</h4>";
            echo "<p class='mb-0'>The file input is empty.</p>";
            echo "</div>";
            return;
        }

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {

            echo "<div class='alert alert-dismissible alert-warning mt-5'>";
            echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
            echo "<h4 class='alert-heading'>We are sorry!</h4>";
            echo "<p class='mb-0'>The file is not an image file.</p>";
            echo "</div>";
            return;
            $uploadOk = 0;
        }



        // Check if file already exists
        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // // Check file size
        // if ($_FILES["avatar"]["size"] > 500000) {        
        //     echo "<div class='alert alert-dismissible alert-warning mt-5'>";
        //     echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
        //     echo "<h4 class='alert-heading'>We are sorry!</h4>";
        //     echo "<p class='mb-0'>The file is too large.</p>";
        //     echo "</div>";
        //     return;
        //     $uploadOk = 0;
        // }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "<div class='alert alert-dismissible alert-warning mt-5'>";
            echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
            echo "<h4 class='alert-heading'>We are sorry!</h4>";
            echo "<p class='mb-0'>Only JPG, JPEG, PNG & GIF files are allowed.</p>";
            echo "</div>";
            return;
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<div class='alert alert-dismissible alert-warning mt-5'>";
            echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
            echo "<h4 class='alert-heading'>We are sorry!</h4>";
            echo "<p class='mb-0'>Your file is not uploaded.</p>";
            echo "</div>";
            return;
            // if everything is ok, try to upload file
        } else {
            $fileName = $_FILES["avatar"]["name"];
            $tmp = explode(".", $fileName);
            $ext = end($tmp);
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], "upload/{$id}.{$ext}")) {
                //echo "The file " . htmlspecialchars(basename($_FILES["avatar"]["name"])) . " has been uploaded.";
            } else {
                echo "<div class='alert alert-dismissible alert-warning mt-5'>";
                echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
                echo "<h4 class='alert-heading'>We are sorry!</h4>";
                echo "<p class='mb-0'>Sorry, there was an error uploading your image.</p>";
                echo "</div>";
                return;
            }
        }
    }

    ?>
    <div class="container">
        <form action="" method="post" class="register-form" enctype="multipart/form-data">
            <h1> Register </h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="avatar" class="form-label mt-4"><b>Avatar</b></label>
            <br>
            <img id='previewAvatar' class='mb-3' src='/MVP_auctionmarket/public/images/avatar.png' alt='' style=' max-height: 256px;'>

            <script>
                var loadFile = function(event) {
                    var output = document.getElementById('previewAvatar');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    
                };
            </script>
            <br>
            <input type='file' name='avatar' id="avatar" onchange="loadFile(event)"><br><br>
            <input type="submit" name="uploadImageBtn" id="uploadImageBtn" value="Upload Image">
            <br>
            <label for="email" class="form-label mt-4"><b>Email</b></label>
            <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required>

            <label for="phone" class="form-label mt-4"><b>Phone</b></label>
            <input type="tel" class="form-control" placeholder="Enter Phone Number" name="phone" id="phone" required>

            <label for="psw" class="form-label mt-4"><b>Password</b></label>
            <input type="password" class="form-control" placeholder="Enter Password" name="psw" id="psw" required>

            <label for="psw-repeat" class="form-label mt-4"><b>Repeat Password</b></label>
            <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>

            <label for="firstName" class="form-label mt-4"><b>First Name</b></label>
            <input type="text" class="form-control" placeholder="Enter first name" name="firstName" id="firstName" required>

            <label for="lastName" class="form-label mt-4"><b>Last Name</b></label>
            <input type="text" class="form-control" placeholder="Enter last name" name="lastName" id="lastName" required>

            <label for="city" class="form-label mt-4"><b>City</b></label>
            <input type="text" class="form-control" placeholder="Enter city" name="city" id="city" required>

            <label for="country" class="form-label mt-4"><b>Country</b></label>
            <input type="text" class="form-control" placeholder="Enter country" name="country" id="country" required>

            <label for="nationalId" class="form-label mt-4"><b>National Id</b></label>
            <input type="text" class="form-control" placeholder="Enter National Id" name="nationalId" id="nationalId" required>

            <label for="branch" class="form-label mt-4">Branch:</label>
            <select id="branch" name="branch">
                <option value="B1">B1 West Branch</option>
                <option value="B2">B2 East Branch</option>
                <option value="B3">B3 South Branch</option>
                <option value="B4">B4 North Branch</option>
            </select>
            &nbsp;
            <label for="gender" class="form-label mt-4">Gender:</label>
            <select id="gender" name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
            <hr>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <button type="submit" class="btn btn-primary" name="btn_register">Register</button>
        </form>
    </div>

    </div>

</body>

</html>