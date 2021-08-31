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
    include 'mvc/views/frontend/nav.php';
    ?>
    
    <div class="container">
        <form action="" method="post" class="register-form">
            <div class='row'>
                <div class='col'><h1> Profile</h1></div>
            </div>
            <hr>

            <label for="email" class="form-label mt-4"><b>Email</b></label>
            <input type="email" class="form-control" placeholder="Email" name="email" id="email" disabled value="<?php echo $data['email']; ?>">

            <label for="phone" class="form-label mt-4"><b>Phone</b></label>
            <input type="tel" class="form-control" placeholder="Phone Number" name="phone" id="phone" disabled value="<?php echo $data['phone']; ?>">

            <label for="firstName" class="form-label mt-4"><b>First Name</b></label>
            <input type="text" class="form-control" placeholder="first name" name="firstName" id="firstName" disabled value="<?php echo $data['first_name']; ?>">

            <label for="lastName" class="form-label mt-4"><b>Last Name</b></label>
            <input type="text" class="form-control" placeholder="last name" name="lastName" id="lastName" disabled value="<?php echo $data['last_name']; ?>">

            <label for="city" class="form-label mt-4"><b>City</b></label>
            <input type="text" class="form-control" placeholder="city" name="city" id="city" disabled value="<?php echo $data['city']; ?>">

            <hr>
        </form>
    </div>

</body>

</html>