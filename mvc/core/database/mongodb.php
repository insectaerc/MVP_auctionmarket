<?php
class MongoDatabase{
    public function connect(){
        //connection for local testing
        //$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        //connection for actual implementing and deploying
        $client = new MongoDB\Client("mongodb+srv://admin:group9@auctionmarket-dbs.adxht.mongodb.net/auctionmarket?retryWrites=true&w=majority");
        //echo "MongoDB connected <br>";
        return $client;
    }
}
?>