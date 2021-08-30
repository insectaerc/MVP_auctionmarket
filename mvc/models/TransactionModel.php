<?php
class TransactionModel extends MySQLDatabase{
    protected $db;

    // set database config for mysql  
    public function __construct(){
        $this->open_db();
    }

    // open mysql database  
    public function open_db(){
        $this->db = parent::connect();
    }

    // close database  
    public function close_db(){
        $this->db->close();
    }

    public function getTransactions(){
        $sqlStatement = "SELECT * FROM transactions";
        try {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = [];
        foreach ($this->db->query($sqlStatement) as $row) {
            array_push($data, $row);
            //print $v;
        }
        $data = array_values($data);
        return $data;
        } catch (PDOException $e) {
        $e->getMessage();
        }
    }
    
    public function getHighestBid($product_id){
        $stmt = $this->db->prepare("SELECT MAX(amount) FROM transactions WHERE product_id=:product_id");
        $stmt->execute(['product_id' => $product_id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function createTransaction($productID, $ownerID, $bidderID, $amount){
        $count = sizeof($this->getTransactions());
        $newId = $count + 1;
        $stmt = $this->db->prepare("INSERT INTO `transactions` (`transaction_id`,`product_id`,`owner_id`,`bidder_id`,`amount`) 
        VALUES (:transaction_id, :product_id, :owner_id, :bidder_id, :amount)");
        $stmt->execute([
        'transaction_id' => $newId,
        'product_id' => $productID,
        'owner_id' => $ownerID,
        'bidder_id' => $bidderID,
        'amount' => $amount
        ]);
    }
}
?>