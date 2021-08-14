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
        include 'mvc\views\frontend\header.html';
    ?>
    <div class="card border-light text-dark mb-3 mx-4">
        <div class="card-header text-danger h2"> End Soon </div>
        <div class="card-body row">
            <?php
            foreach ($endSoonProducts as $entry){
                echo    "<div class='col'>";
                echo    "<a href='product/detail/{$entry['_id']}' style='text-decoration: none'>";
                echo            "<img class='mb-3' src='public\images\dollarsign.jpg' alt='' style='max-width:100%; max-height:100%'>";
                echo            "<h4 class='card-title'>{$entry['name']}</h4>";
                echo        "</a>";
                echo        "<div class='row'>";
                echo            "<div class='col'>";
                echo                "<p>Current Bid: ";
                echo                '$';
                echo                "{$entry['maxBid']}</p>";
                echo                "<p>Close on: {$entry['closingTime']}</p>";
                echo            "</div>";
                echo            "<div class='col d-flex align-items-center'>";
                echo                "<button type='button' class='btn btn-success w-100 '>Bid</button>";
                echo            "</div>";
                echo        "</div>";
                echo    "</div>";
            }
            ?>
        </div>
    </div>
    <div class="card border-light text-dark mb-3 mx-4">
        <div class="card-header text-danger h2"> High Price </div>
        <div class="card-body row">
            <?php
            foreach ($highBidProducts as $entry){
                echo    "<div class='col'>";
                echo    "<a href='product' style='text-decoration: none'>";
                echo            "<img class='mb-3' src='public\images\dollarsign.jpg' alt='' style='max-width:100%; max-height:100%'>";
                echo            "<h4 class='card-title'>{$entry['name']}</h4>";
                echo        "</a>";
                echo        "<div class='row'>";
                echo            "<div class='col'>";
                echo                "<p>Current Bid: ";
                echo                '$';
                echo                "{$entry['maxBid']}</p>";
                echo                "<p>Close on: {$entry['closingTime']}</p>";
                echo            "</div>";
                echo            "<div class='col d-flex align-items-center'>";
                echo                "<button type='button' class='btn btn-success w-100 '>Bid</button>";
                echo            "</div>";
                echo        "</div>";
                echo    "</div>";
            }
            ?>
        </div>
    </div>
    <div class="card border-light text-dark mb-3 mx-4">
        <div class="card-header text-danger h2"> Most Bidded </div>
        <div class="card-body row">
            <?php
            foreach ($mostBiddedProducts as $entry){
                echo    "<div class='col'>";
                echo    "<a href='product' style='text-decoration: none'>";
                echo            "<img class='mb-3' src='public\images\dollarsign.jpg' alt='' style='max-width:100%; max-height:100%'>";
                echo            "<h4 class='card-title'>{$entry['name']}</h4>";
                echo        "</a>";
                echo        "<div class='row'>";
                echo            "<div class='col'>";
                echo                "<p>Current Bid: ";
                echo                "$";
                echo                "{$entry['maxBid']}</p>";
                echo                "<p>Close on: {$entry['closingTime']}</p>";
                echo            "</div>";
                echo            "<div class='col d-flex align-items-center'>";
                echo                "<button type='button' class='btn btn-success w-100 '>Bid</button>";
                echo            "</div>";
                echo        "</div>";
                echo    "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>