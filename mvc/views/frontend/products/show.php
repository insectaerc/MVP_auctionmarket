Product Show Page
<?php
    echo '<pre>';
    foreach ($data as $entry){
        echo $entry['name'] . ' '.$entry['minPrice'] . ' '.$entry['closingTime'] . "<br>";
    }
?>