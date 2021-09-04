<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="mvc/views/frontend/style.css" rel="stylesheet" type="text/css">

    <title>Admin</title>
</head>

<body>

    <?php include 'mvc/views/frontend/navadmin.php'; ?>
    <br> </br>

    <h1 align="center" style="color:Peru" ;> Transaction Management </h1>
    <!-- Search transactions -->
    <div class="form-row">
        <form action="/MVP_auctionmarket/admin/trans/" method="POST">
            <div class="col">
                <input type="text" class="form-control" placeholder="Search transaction" id="product_id" name="product_id">
                <input type="submit">
            </div>
    </div>
    </form>


    <div class='mx-5 my-3'>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Owner ID</th>
                    <th scope="col">Bidder ID</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                <!-- Show all transactions -->
                <?php
                $amount = 0;
                if (isset($_POST['product_id']) == false) {
                    foreach ($data as $entry) {
                        $amount = $amount + $entry['amount'] ?>
                        <tr>
                            <td> <?php echo $entry['transaction_id']; ?></td>
                            <td> <?php echo $entry['product_id']; ?></td>
                            <td> <?php echo $entry['owner_id']; ?></td>
                            <td> <?php echo $entry['bidder_id']; ?></td>
                            <td> <?php echo $entry['amount']; ?></td>
                            <td> <?php echo $entry['createdAt']; ?></td>

                        </tr>
                    <?php }
                } else {
                    foreach ($data as $entry) {
                        $amount = $amount + $entry['amount'] ?>

                        <tr>
                            <td> <?php echo $entry['transaction_id']; ?></td>
                            <td> <?php echo $entry['product_id']; ?></td>
                            <td> <?php echo $entry['owner_id']; ?></td>
                            <td> <?php echo $entry['bidder_id']; ?></td>
                            <td> <?php echo $entry['amount']; ?></td>
                            <td> <?php echo $entry['createdAt']; ?></td>

                        </tr>
                    <?php } ?>
                    <h6>Search for Transaction between two time periods</h6>
                    <div class="form-row">
                        <form action="/MVP_auctionmarket/admin/searchtime/" method="POST">
                            <div class="col-3">
                                <!-- <p>Transaction ID:</p> -->
                                <input type="text" class="form-control" placeholder="Search transaction" id="product_id" name="product_id" value="<?php echo $entry['product_id']; ?>" hidden>
                                <p>Start:</p>
                                <input type="datetime-local" class="form-control me-sm-2" placeholder="Search transaction" id="d1" name="d1">

                            </div>
                            <p>End:</p>

                            <div class="col-3">
                                <input type="datetime-local" class="form-control me-sm-2" placeholder="Search transaction" id="d2" name="d2">
                                <input type="submit" name="save">
                            </div>

                    </div>
                    </form>




                    </br>

                <?php } ?>

                <div class="card text-white bg-success mb-3" style="max-width: 20rem;">

                    <div class="card-body">
                        <h4 class="card-title">Total amount of money</h4>
                        <p class="card-text"><?php echo '$' . $amount; ?>
                    </div>
                    </p>


                </div>
    </div>
    </tbody>
    </table>
    </div>
</body>

</html>