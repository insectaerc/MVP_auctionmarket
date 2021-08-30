<?php
class MySQLDatabase{
    public function connect(){
        

        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "auctionmarket";

        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        return $conn;
    }
}
?>