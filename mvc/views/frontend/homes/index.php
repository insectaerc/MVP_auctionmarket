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
                echo    "<div class='col'>";
                echo    "<a href='/MVP_auctionmarket/product/detail/{$entry['_id']}' style='text-decoration: none'>";
                echo            "<img class='mb-3' src='/MVP_auctionmarket/public/images/dollarsign.jpg' alt='' style='max-width:100%; max-height:100%'>";
                echo            "<h4 class='card-title'>{$entry['name']}</h4>";
                echo        "</a>";
                echo        "<div class='row'>";
                echo            "<div class='col'>";
                echo                "<p>Minimum Bid: <br>";
                echo                '$';
                echo                "{$entry['minBid']}</p>";
                echo                "<p>Close on: <br>{$entry['closingTime']}</p>";
                echo            "</div>";
                echo            "<div class='col d-flex align-items-center'>";
                echo                "<a href='/MVP_auctionmarket/product/detail/{$entry['_id']}' class='btn btn-success w-100' role='button'>Bid</a>";
                echo            "</div>";
                echo        "</div>";
                echo    "</div>";
            }
            ?>
        </div>
    </div>
    <div class="card border-secondary text-dark mb-3 mx-4" id='highbids'>
        <a href="/MVP_auctionmarket/product/show/highbid" class='text-decoration-none'><div class="card-header text-danger h2"> High Bid </div></a>
        <div class="card-body row">
            <?php
            foreach ($highBidProducts as $entry){
                echo    "<div class='col'>";
                echo    "<a href='/MVP_auctionmarket/product/detail/{$entry['_id']}' style='text-decoration: none'>";
                echo            "<img class='mb-3' src='public/images/dollarsign.jpg' alt='' style='max-width:100%; max-height:100%'>";
                echo            "<h4 class='card-title'>{$entry['name']}</h4>";
                echo        "</a>";
                echo        "<div class='row'>";
                echo            "<div class='col'>";
                echo                "<p>Current Bid: <br>";
                echo                '$';
                echo                "{$entry['maxBid']}</p>";
                echo                "<p>Close on: <br>{$entry['closingTime']}</p>";
                echo            "</div>";
                echo            "<div class='col d-flex align-items-center'>";
                echo                "<a href='/MVP_auctionmarket/product/detail/{$entry['_id']}' class='btn btn-success w-100' role='button'>Bid</a>";
                echo            "</div>";
                echo        "</div>";
                echo    "</div>";
            }
            ?>
        </div>
    </div>
    <div class="card border-secondary text-dark mb-3 mx-4" id='mostbidded'>
        <a href="/MVP_auctionmarket/product/show/mostbidded" class='text-decoration-none'><div class="card-header text-danger h2"> Most Bidded </div></a>
        <div class="card-body row">
            <?php
            foreach ($mostBiddedProducts as $entry){
                echo    "<div class='col'>";
                echo    "<a href='/MVP_auctionmarket/product/detail/{$entry['_id']}' style='text-decoration: none'>";
                echo            "<img class='mb-3' src='public/images/dollarsign.jpg' alt='' style='max-width:100%; max-height:100%'>";
                echo            "<h4 class='card-title'>{$entry['name']}</h4>";
                echo        "</a>";
                echo        "<div class='row'>";
                echo            "<div class='col'>";
                echo                "<p>Current Bid: <br>";
                echo                "$";
                echo                "{$entry['maxBid']}</p>";
                echo                "<p>Close on: <br>{$entry['closingTime']}</p>";
                echo            "</div>";
                echo            "<div class='col d-flex align-items-center'>";
                echo                "<a href='/MVP_auctionmarket/product/detail/{$entry['_id']}' class='btn btn-success w-100' role='button'>Bid</a>";
                echo            "</div>";
                echo        "</div>";
                echo    "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>