<?php
class MySQLDatabase{
    public function connect(){
        

        $servername = "localhost:3307";
        $username = "root";
        $password = "Admin3198";
        $dbname = "auctionmarket";

        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        return $conn;
    }
}
?>