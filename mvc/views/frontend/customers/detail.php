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
        <h1> Profile</h1>
        <hr>
        <div class='row'>
            <div class='col'></div>
            <div class='col' >
                <h3>Picture</h3>
                <div class='card' style='height: 250px;'>
                    <img id='Avatar' class='mb-3' src='/MVP_auctionmarket/upload/<?php echo $data['customer_id']; ?>' alt='Profile Picture' style='height: 250px;'>
                </div>
            </div>
            <div class='col'></div>
        </div>
        <hr>
        <div class='card border-light mb-3'>
            <div class="card-header h3">Information</div>
            <div class="card-body">
                <div class='row'>
                    <div class='col'>
                        <label for="email" class="form-label mt-4"><b>Email</b></label>
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" disabled value="<?php echo $data['email']; ?>">

                        <label for="phone" class="form-label mt-4"><b>Phone</b></label>
                        <input type="tel" class="form-control" placeholder="Phone Number" name="phone" id="phone" disabled value="<?php echo $data['phone']; ?>">

                        <label for="firstName" class="form-label mt-4"><b>First Name</b></label>
                        <input type="text" class="form-control" placeholder="first name" name="firstName" id="firstName" disabled value="<?php echo $data['first_name']; ?>">

                        <label for="lastName" class="form-label mt-4"><b>Last Name</b></label>
                        <input type="text" class="form-control" placeholder="last name" name="lastName" id="lastName" disabled value="<?php echo $data['last_name']; ?>">
                    </div>
                    <div class='col'>
                        <label for="gender" class="form-label mt-4">Gender:</label>
                        <input type="text" class="form-control" placeholder="Gender" name="gender" id="gender" disabled value="<?php echo $data['gender']; ?>">

                        <label for="city" class="form-label mt-4"><b>City</b></label>
                        <input type="text" class="form-control" placeholder="city" name="city" id="city" disabled value="<?php echo $data['city']; ?>">

                        <label for="country" class="form-label mt-4"><b>Country</b></label>
                        <input type="text" class="form-control" placeholder="country" name="country" id="country" disabled value="<?php echo $data['country']; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>