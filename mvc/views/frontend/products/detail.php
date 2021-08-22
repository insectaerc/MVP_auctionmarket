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
        <?php
        foreach ($data as $entry){
            echo "<div class='col text-center' style='height:500px'>";
            echo     "<img style='height:500px'src='/MVP_auctionmarket/public/images/dollarsign.jpg' alt='missing image I dont know why'>
            </div>";
            echo "<div class='col'>";
            echo    "<h2>{$entry['name']}</h2>";
            echo    "<p>Product Information: blabla</p>";
            echo    "<br>";
            echo    "<h4>Starting Bid: $";
            echo    "{$entry['minPrice']}</h4>";
            echo    "<h4>Current Bid: $";
            echo    "{$entry['maxBid']}</h4>";

            echo    "<button type='button' class='btn btn-success'>Bid</button>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>