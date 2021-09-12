<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php 
        include 'mvc/views/frontend/nav.php';
    ?>
    <div class="card border-secondary text-dark mb-3 mx-4" id='endsoon'>
        <a href="/MVP_auctionmarket/product/show/endsoon" class='text-decoration-none'><div class="card-header text-danger h2"> End Soon </div></a>
        <div class="card-body row">
            <?php
            foreach ($endSoonProducts as $entry){
            ?>
                <div class='col'>
                    <a href="/MVP_auctionmarket/product/detail/<?php echo $entry['_id'] ?>" style='text-decoration: none'>
                        <img class='mb-3' src='/MVP_auctionmarket/upload/<?php echo $entry['name']; ?>' alt='' style='max-width:100%; max-height:100%'>
                        <h4 class='card-title'><?php echo $entry['name'] ?></h4>
                    </a>
                    <div class='row'>
                        <div class='col'>
                            <p>Minimum Bid: <br> <?php echo '$'.number_format($entry['minBid'],2) ?></p>
                            <p>Current Bid: <br> <?php echo '$'.number_format($entry['highestBid'],2) ?></p>
                        </div>
                        <div class='col align-items-center'>
                            <p>Close on: <br> <?php echo date('Y-m-d H:i:s', strtotime((string)$entry['closingTime'])) ?></p>
                            <a href="/MVP_auctionmarket/product/detail/<?php echo $entry['_id'] ?>" class='btn btn-success w-100' role='button'>Bid</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card border-secondary text-dark mb-3 mx-4" id='highbids'>
        <a href="/MVP_auctionmarket/product/show/highbid" class='text-decoration-none'><div class="card-header text-danger h2"> High Bid </div></a>
        <div class="card-body row">
            <?php
            foreach ($highBidProducts as $entry){
            ?>
                <div class='col'>
                    <a href="/MVP_auctionmarket/product/detail/<?php echo $entry['_id'] ?>" style='text-decoration: none'>
                        <img class='mb-3' src='/MVP_auctionmarket/upload/<?php echo $entry['name']; ?>' alt='' style='max-width:100%; max-height:100%'>
                        <h4 class='card-title'><?php echo $entry['name'] ?></h4>
                    </a>
                    <div class='row'>
                        <div class='col'>
                            <p>Minimum Bid: <br> <?php echo '$'.number_format($entry['minBid'],2) ?></p>
                            <p>Current Bid: <br> <?php echo '$'.number_format($entry['highestBid'],2) ?></p>
                        </div>
                        <div class='col align-items-center'>
                            <p>Close on: <br> <?php echo date('Y-m-d H:i:s', strtotime((string)$entry['closingTime'])) ?></p>
                            <a href="/MVP_auctionmarket/product/detail/<?php echo $entry['_id'] ?>" class='btn btn-success w-100' role='button'>Bid</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card border-secondary text-dark mb-3 mx-4" id='mostbidded'>
        <a href="/MVP_auctionmarket/product/show/mostbidded" class='text-decoration-none'><div class="card-header text-danger h2"> Most Bidded </div></a>
        <div class="card-body row">
            <?php
            foreach ($mostBiddedProducts as $entry){
            ?>
                <div class='col'>
                    <a href="/MVP_auctionmarket/product/detail/<?php echo $entry['_id'] ?>" style='text-decoration: none'>
                        <img class='mb-3' src='/MVP_auctionmarket/upload/<?php echo $entry['name']; ?>' alt='' style='max-width:100%; max-height:100%'>
                        <h4 class='card-title'><?php echo $entry['name'] ?></h4>
                    </a>
                    <div class='row'>
                        <div class='col'>
                            <p>Minimum Bid: <br> <?php echo '$'.number_format($entry['minBid'],2) ?></p>
                            <p>Current Bid: <br> <?php echo '$'.number_format($entry['highestBid'],2) ?></p>
                        </div>
                        <div class='col align-items-center'>
                            <p>Close on: <br> <?php echo date('Y-m-d H:i:s', strtotime((string)$entry['closingTime'])) ?></p>
                            <a href="/MVP_auctionmarket/product/detail/<?php echo $entry['_id'] ?>" class='btn btn-success w-100' role='button'>Bid</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>