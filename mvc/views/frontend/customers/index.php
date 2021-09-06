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
        <div class='row'>
            <div class='col'>
                <h1> Profile</h1>
            </div>
            <div class='col'>
                <div class='row'>
                    <div class='col-2'></div>
                    <div class='col-7'>
                        <a href="/MVP_auctionmarket/customer/history">
                            <button type="button" class="btn btn-success" style="float:right">Bidding History</button>
                        </a>
                    </div>
                    <div class='col-3'>
                        <a href="/MVP_auctionmarket/customer/inventory">
                            <button type="button" class="btn btn-success" style="float:right">Inventory</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class='row mb-3'>
            <div class='col-2'></div>
            <div class='col-4'>
                <h3>Picture</h3>
                <div class='card' style='height: 250px' >
                    <img id='Avatar' class='mb-3' src='/MVP_auctionmarket/upload/<?php echo $data['customer_id']; ?>' alt='Profile Picture' style='height: 250px'>
                </div>
            </div>
            <div class='col-4'>
                <label for="balance" class="form-label mt-4"><b>Balance</b></label>
                <input type="balance" class="form-control" placeholder="balance" name="balance" id="balance" disabled value="<?php echo '$'.number_format($data['balance'],2) ?>">
            </div>
            <div class='col-2'></div>
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

                        <label for="psw" class="form-label mt-4"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Password" name="psw" id="psw" disabled value="<?php echo $data['pass']; ?>">

                        <label for="firstName" class="form-label mt-4"><b>First Name</b></label>
                        <input type="text" class="form-control" placeholder="first name" name="firstName" id="firstName" disabled value="<?php echo $data['first_name']; ?>">

                        <label for="lastName" class="form-label mt-4"><b>Last Name</b></label>
                        <input type="text" class="form-control" placeholder="last name" name="lastName" id="lastName" disabled value="<?php echo $data['last_name']; ?>">
                    </div>
                    <div class='col'>
                        <label for="city" class="form-label mt-4"><b>City</b></label>
                        <input type="text" class="form-control" placeholder="city" name="city" id="city" disabled value="<?php echo $data['city']; ?>">

                        <label for="country" class="form-label mt-4"><b>Country</b></label>
                        <input type="text" class="form-control" placeholder="country" name="country" id="country" disabled value="<?php echo $data['country']; ?>">

                        <label for="nationalId" class="form-label mt-4"><b>National ID</b></label>
                        <input type="text" class="form-control" placeholder="National Id" name="nationalId" id="nationalId" disabled value="<?php echo $data['national_id']; ?>">

                        <label for="branch" class="form-label mt-4">Branch:</label>
                        <input type="text" class="form-control" placeholder="Branch" name="branch" id="branch" disabled value="<?php echo $data['branch_id']; ?>">

                        <label for="gender" class="form-label mt-4">Gender:</label>
                        <input type="text" class="form-control" placeholder="Gender" name="gender" id="gender" disabled value="<?php echo $data['gender']; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>