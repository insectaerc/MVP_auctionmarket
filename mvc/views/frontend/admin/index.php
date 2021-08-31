<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="mvc/views/frontend/style.css" rel="stylesheet" type="text/css">
    <title>Admin</title>
</head>

<body >
<?php 
        include 'mvc/views/frontend/navadmin.php';
    ?>
<br> </br>
<h1 align="center"> ADMIN DASHBOARD </h1>

<!-- //Customer Info Management -->
<div class = text-center >
<div class="card border-light text-dark mb-3 mx-4" style="background-color:lightblue">
<div class="card border-primary mb-3" style="max-width: 20rem" center>
  <div class="card-header">Customer Information</div>
  <div class="card-body">
    <h4 class="card-title">Update Customer's balance</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <div class="d-grid gap-2">
  <a href="/MVP_auctionmarket/admin/info"a>
  <button class="btn btn-primary"name = "info_btn" type="button">Click here</button>
  </a>
  </div>
  </div>
  <!-- //Transaction Management -->

  <div class="card border-info mb-3" style="max-width: 20rem;">
  <div class="card-header">Transaction</div>
  <div class="card-body">
    <h4 class="card-title">Transaction Management</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <a href="/MVP_auctionmarket/admin/trans"a>
  <button class="btn btn-primary" name = "transaction_btn" type="button">Click here</button>
  </a>
  </div>
  

    </body>
    
    </html>
    