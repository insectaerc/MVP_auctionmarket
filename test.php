<?php
    //connection for local testing
    //$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    //connection for actual implementing and deploying
    $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:group9@auctionmarket-dbs.adxht.mongodb.net/auctionmarket?retryWrites=true&w=majority");

    $qry = new MongoDB\Driver\Query([]);
     
    $rows = $mng->executeQuery("auctionmarket.customers", $qry);
   
    foreach ($rows as $row) {
            echo nl2br("$row->email\n");
    };
