<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <?php 
        require 'mvc/views/frontend/nav.php';
    ?>
    <div class="card border-light text-dark mb-3 mx-4">
        <div class="card-header text-danger h2"> Open For Bidding </div>
            <?php
                foreach ($data as $key=>$entry){
                    if($key % 4 == 0){
                        echo "<div class='card-body row'>";
                        $entryCount = 1;
                    }
            ?>
                    <div class='col-3'>
                        <a href="/MVP_auctionmarket/product/detail/<?php echo $entry['_id'] ?>" style='text-decoration: none'>
                            <img class='mb-3' src='/MVP_auctionmarket/upload/<?php echo $entry['name']; ?>' alt='' style='max-width:100%; max-height:100%'>
                            <h4 class='card-title'><?php echo $entry['name'] ?></h4>
                        </a>
                        <div class='row'>
                            <div class='col'>
                                <p>Minimum Bid: <br> <?php echo '$'.$entry['minBid'] ?></p>
                                <p>Current Bid: <br> <?php echo '$'.$entry['highestBid'] ?></p>
                            </div>
                            <div class='col align-items-center'>
                                <p>Close on: <br> <?php echo date('Y-m-d H:i:s', strtotime((string)$entry['closingTime'])) ?></p>
                                <a href="/MVP_auctionmarket/product/detail/<?php echo $entry['_id'] ?>" class='btn btn-success w-100' role='button'>Bid</a>
                            </div>
                        </div>
                    </div>
            <?php
                    if($entryCount % 4 ==0){
                        echo "</div>";
                    }
                    $entryCount ++;
                }
            ?>
        </div>
    </div>
</body>
</html>