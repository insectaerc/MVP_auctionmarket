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
    <form action="/MVP_auctionmarket/admin/trans/" method="POST">
        <div class="row mx-3">
            <div class="col-11">
                <input type="text" class="form-control" placeholder="Search transaction" id="product_id" name="product_id">
            </div>
            <div class='col-1'>
                <button type='submit' name='search_trans_btn' class='btn btn btn-info'>Search</button>
            </div>
        </div>
    </form>
    <!-- Display Data -->
    <?php if(isset($_POST['search_trans_btn']) || isset($_POST['search_2timepoints_btn'])) { ?><div class='row'> <?php } ?>
        <div class='<?php if(isset($_POST['search_trans_btn'])  && sizeof($data) > 0 || isset($_POST['search_2timepoints_btn'])){ echo 'col-9';} ?>'>
            <table class="table table-hover text-center small">
                <thead>
                    <tr>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Transaction Type</th>
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
                    foreach ($data as $entry) {
                        $amount = $amount + $entry['amount'] ?>
                        <tr>
                            <td> <?php echo $entry['transaction_id']; ?></td>
                            <td> <?php echo $entry['transaction_type'] ?></td>
                            <td> <?php echo $entry['product_id']; ?></td>
                            <td> <?php echo $entry['owner_id']; ?></td>
                            <td> <?php echo $entry['bidder_id']; ?></td>
                            <td> <?php echo $entry['amount']; ?></td>
                            <td> <?php echo $entry['createdAt']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php if(sizeof($data) == 0){echo "<div class='mx-5'>". $_SESSION['emptyDataMessage'].'</div>';}?>
        </div>
        <?php if(isset($_POST['search_trans_btn']) && sizeof($data) > 0 || isset($_POST['search_2timepoints_btn'])){ ?>
            <div class='col-3'>
                <div class='border-secondary mb-3' style="max-width: 20rem;">
                    <div class="card-header">Search for Transactions between two time points</div>
                    <div class='card-body'>
                        <form action="/MVP_auctionmarket/admin/searchtime/" method="POST">
                            <!-- product_id -->
                            <input type="text" class="form-control" placeholder="Search transaction" id="product_id" name="product_id" value="<?php if(sizeof($data) > 0){echo $entry['product_id'];} if(sizeof($data) == 0){echo $product_id;}?>" hidden>
                            <div class="form-group row">
                                <label for="d1" class="col-sm-4 col-form-label">Start</label>
                                <div class="col-sm-8">
                                    <input type="datetime-local" class="form-control me-sm-2" placeholder="Search transaction" id="d1" name="d1">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="d2" class="col-sm-4 col-form-label">End</label>
                                <div class="col-sm-8">
                                    <input type="datetime-local" class="form-control me-sm-2" placeholder="Search transaction" id="d2" name="d2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8 w-100">
                                    <button type='submit' name='search_2timepoints_btn' class='btn btn btn-info w-100'>Search</button>
                                </div>
                            </div>
                        </form>
                        <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">Total amount of transacted money</h5>
                                <p class="card-text"><?php echo '$'.number_format($amount,2) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Undo Feature -->
                <!-- Only available after the admin have searched for a particular valid product -->
                <?php if(sizeof($data) >0){ ?>
                <div class='border-secondary mb-3' style="max-width: 20rem;">
                    <div class="card-header">Undo the last transaction</div>
                    <div class='card-body'>
                        <p class="card-text">Payback the transacted money to the current winning bidder's account and subtract the transacted money out the account of the product's owner.</p>
                        <div class='text-center'>
                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#undoModal' data-toggle='tooltip' data-placement='bottom' title='Undo the last transaction'>
                            Undo Transaction</button>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- DELETE Modals -->
                    <div class="modal" id="undoModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Caution</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to undo the last transaction of this product?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="/MVP_auctionmarket/admin/undoLastTran/<?php echo $product_id ?>"> <button type="button" class="btn btn-danger">Confirm</button> </a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        <?php } ?>
        
    <?php if(isset($_POST['search_trans_btn']) || isset($_POST['search_2timepoints_btn'])){ ?> </div> <?php } ?>
</body>

</html>