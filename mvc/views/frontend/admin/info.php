
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
        include 'mvc/views/frontend/navadmin.php';
    ?>
<br> </br>
    <h1 align="center"> Customers Information </h1>
    <table class="table table-hover">
    <thead>
    <tr>
    <th scope="col">ID</th>
    <th scope="col">Email</th>
    <th scope="col">Phone Number</th>
    <th scope="col">Account Balance</th>
    <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php // CODE HIỂN THỊ NGƯỜI DÙNG ?>
    <?php foreach ($data as $entry){ ?>
        <tr>
        <td> <?php echo $entry['customer_id']; ?></td>
        <td><?php echo $entry['email']; ?></td>
        <td><?php echo $entry['phone']; ?></td>
        <td><?php echo "$", $entry['balance']; ?></td>
        <td>
        <label class="btn btn-outline-primary" name= dlt_btn for="btnradio1">Delete</label>
        <label class="btn btn-outline-primary" name= edit_btn for="btnradio2">Edit</label> </td>
        
        </tr>
    <?php } ?>

    </tbody>
    </table>

    <?php
        //echo "This is Button1 that is selected";
        $controller = CustomerController::$instance;
        if (isset($_POST['eedit_btn'])) {
            $controller::$instance->updateBalanceOfCustomer();
        }
        ?>
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
      <button class="btn btn-primary" type="button" id="button-addon2">Button</button>
    </div>

    </body>
    
    </html>
    

