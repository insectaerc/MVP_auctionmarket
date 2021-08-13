Product Show Page
<?php
    echo '<pre>';
    $product = [];
    $product = $data[0];
    echo $product['name'] . ' '.$product['minPrice'] . ' '.$product['closingTime'] . "<br>";
?>