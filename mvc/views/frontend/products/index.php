<h1>Product View Page</h1>
<h2>List of products</h2>
<?php
    echo '<pre>';
    foreach ($data as $entry){
        echo $entry['name'] . ' '.$entry['minPrice'] . ' '.$entry['closingTime'] . "<br>";
    }
?>