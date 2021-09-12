<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Detail</title>
</head>
<body>
    <?php 
        require 'mvc/views/frontend/nav.php';
    ?>
    <div class= 'row mx-5'>
        <div class='col text-center' style='height:500px'>
            <img style='height:500px width:500px'src='/MVP_auctionmarket/upload/<?php echo $product['name']; ?>' alt='missing image I dont know why'>
        </div>
        <div class='col'>
            <h2><?php echo $product['name'] ?></h2>
            <p>Product Information: <?php echo $product['description']; ?></p>
            <p>Item's owner: <a href="/MVP_auctionmarket/customer/detail/<?php echo $product['ownerID'] ?>">Contact</a></p>
            <br>
            <div class='row'>
                <div class='col'>
                    <h4>Close On:</h4>
                </div>
                <div class='col'>
                    <h4><?php echo date('Y-m-d H:i:s', strtotime((string)$product['closingTime'])) ?></h4>
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    <h4>Minimum Bid:</h4>
                </div>
                <div class='col'>
                    <h4>$<?php echo number_format($product['minBid'],2) ?></h4>
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    <h4>Current Highest Bid:</h4>
                </div>
                <div class='col'>
                    <h4>$<?php echo number_format($product['highestBid'],2) ?></h4>
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    <h4>The item has been bidded:</h4>
                </div>
                <div class='col'>
                    <h4><?php echo $product['bidNum']; if($product['bidNum']>1){echo ' Times';}else{echo ' Time';} ?> </h4>
                </div>
            </div>
            <?php
            if(isset($_SESSION['customer_id'])){
                if($_SESSION['customer_id'] != $product['ownerID']){
                    echo "<button name='bid_button' type='button' class='btn btn-success' data-toggle='modal' data-target='#biddingModal' data-toggle='tooltip' data-placement='bottom' title='Start bidding for this item'>Bid</button>";
                }
            }else{
                echo "<button type='button' class='btn btn-success' data-toggle='tooltip' data-placement='bottom' title='Start bidding for this item'>Bid</button>";
            }
            ?>
            <?php
            if(isset($_SESSION['customer_id']) == false){
                echo "<div class='alert alert-dismissible alert-info' id='plsLoginModal'>";
                echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
                echo "<h4 class='alert-heading'>Caution!</h4>";
                echo "<p class='mb-0'>Please go to 'Profile' page and Sign-in or Register (if you haven't gotten any account) first if you want to bid for this item.</p>";
                echo "</div>";
            }
            ?>

            <?php
                if(isset($_SESSION['message'])){
                    echo "<div class='alert alert-dismissible alert-warning mt-5'>";
                    echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
                    echo "<h4 class='alert-heading'>We are sorry!</h4>";
                    echo "<p class='mb-0'>{$_SESSION['message']}</p>";
                    echo "</div>";
                    unset($_SESSION["message"]);
                }
            ?>

            <!-- Bidding Model -->
            <div class="modal" id="biddingModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Bidding Form</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                            </button>
                        </div>
                        <form action="/MVP_auctionmarket/product/bid/<?php echo $product['_id']?>" method="post">
                            <div class="modal-body">
                                <fieldset>
                                    <legend>How much do you want to bid?</legend>
                                    <div class="form-group row">
                                        <label for="currentBid" class="col-sm-5 col-form-label">Current Highest Bid:</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control-plaintext" id="currentBid" name="currentBid" value="<?php echo '$'.number_format($product['highestBid'],2) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="amount" class="col-sm-5 col-form-label">Your Bid:</label>
                                        <div class="col-sm-7">
                                            <input type="number" step=0.01 min=0 class="form-control-plaintext" id="amount" name="amount" placeholder="Enter the amount of money (USD)" required>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name='bid_confirm_btn'>Confirm</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>