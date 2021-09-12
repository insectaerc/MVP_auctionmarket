<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body>
    <?php 
        require 'mvc/views/frontend/nav.php';
    ?>
    <div class="card border-light text-dark mb-3 mx-4">
        <div class="card-header text-danger h2"> <?php echo $title.' Items'?> </div>
            <?php
                foreach ($data as $key=>$entry){
                    if($key % 4 == 0){
                        echo "<div class='card-body row'>";
                        $entryCount = 1;
                    }?>
                    <div class='col-3'>
                        <div style='height:250px' class='mb-2'>
                            <a href="/MVP_auctionmarket/product/detail/<?php echo $entry['_id'] ?>" style='text-decoration: none'>
                                <img class='mb-3' src="/MVP_auctionmarket/upload/<?php echo $entry['name']; ?>" alt='' style='max-width:100%; max-height:100%'>
                            </a>
                        </div>
                        <div class='row'>
                            <div style='height:80px' class='mb-1'>
                                <a href="/MVP_auctionmarket/product/detail/<?php echo $entry['_id'] ?>" style='text-decoration: none'>
                                    <h4 class='card-title' class='mb-2'><?php echo $entry['name'] ?></h4>
                                </a>
                            </div>
                            
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