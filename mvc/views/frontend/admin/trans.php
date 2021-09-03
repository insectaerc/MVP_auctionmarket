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
                
                    foreach ($data as $entry) { ?>
                        <tr>
                            <td> <?php echo $entry['transaction_id']; ?></td>
                            <td> <?php echo $entry['product_id']; ?></td>
                            <td> <?php echo $entry['owner_id']; ?></td>
                            <td> <?php echo $entry['bidder_id']; ?></td>
                            <td> <?php echo $entry['amount']; ?></td>
                            <td> <?php echo $entry['createdAt']; ?></td>

                        </tr>
                    <?php }
                 { ?>
                    <h6>Search for Transaction between two time periods</h6>
                    <p>Start:</p>
                    <div class="form-row">
                        <form action="/MVP_auctionmarket/admin/searchtime/" method="POST">
                            <div class="col-3">
                                <input type="datetime-local" class="form-control me-sm-2" placeholder="Search transaction" id="d1" name="d2">

                            </div>
                            <p>End:</p>
                            
                                    <div class="col-3">
                                        <input type="datetime-local" class="form-control me-sm-2" placeholder="Search transaction" id="d2" name="d2">
                                        <input type="submit">
                                    </div>
                                    <!-- <?php echo $data['product_id']; ?> -->
                            </div>
                        </form>
                        
                        <!-- <td> <?php echo $data['transaction_id']; ?></td>
                        <td> <?php echo $data['product_id']; ?></td>
                        <td> <?php echo $data['owner_id']; ?></td>
                        <td> <?php echo $data['bidder_id']; ?></td>
                        <td> <?php echo $data['amount']; ?></td>
                        <td> <?php echo $data['createdAt']; ?></td> -->
                    <?php } ?>


            </tbody>
        </table>
    </div>
</body>