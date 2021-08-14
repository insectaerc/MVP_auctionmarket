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
        require 'mvc\views\frontend\header.html';
    ?>
    <div class="card border-light text-dark mb-3 mx-4">
        <div class="card-header text-danger h2"> Open For Bidding </div>
            <?php
                foreach ($data as $key=>$entry){
                    if($key % 4 == 0){
                        echo "<div class='card-body row'>";
                        $entryCount = 1;
                    }
                    echo    "<div class='col-3'>";
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