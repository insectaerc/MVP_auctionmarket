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
    
    public function getPreviousBidAmount($product_id){
        $stmt = $this->db->prepare("SELECT bidder_id, amount FROM (SELECT bidder_id, amount FROM transactions WHERE product_id = :product_id
        ORDER BY amount DESC LIMIT 2) AS `last2Transactions` ORDER BY amount LIMIT 1");
        $stmt->execute(['product_id' => $product_id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function createTransaction($productID, $transactionType, $ownerID, $bidderID, $amount){
        $count = sizeof($this->getTransactions());
        $newId = $count + 1;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dateTime = date("Y-m-d H:i:s");
        $stmt = $this->db->prepare("INSERT INTO `transactions` (`transaction_id`, `transaction_type`, `product_id`,`owner_id`,`bidder_id`,`amount`, `createdAt`) 
        VALUES (:transaction_id, :transaction_type, :product_id, :owner_id, :bidder_id, :amount, :createdAt)");
        $stmt->execute([
        'transaction_id' => $newId,
        'transaction_type' => $transactionType,
        'product_id' => $productID,
        'owner_id' => $ownerID,
        'bidder_id' => $bidderID,
        'amount' => $amount,
        'createdAt' => $dateTime
        ]);
    }

    public function getTrans_byproductid($product_id){
        $stmt = $this->db->prepare("SELECT * FROM transactions WHERE product_id=:product_id");
        $stmt->execute(['product_id' => $product_id]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function search_trans_by_time($product_id,$d1,$d2){
        $stmt = $this->db->prepare("SELECT * FROM transactions WHERE createdAt BETWEEN :d1 AND :d2 AND product_id=:product_id ");
        $stmt->execute([
            'product_id' => $product_id,
            'd1' => $d1,
            'd2' => $d2
        ]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getLastTran_byProductId($productId){
        $stmt = $this->db->prepare("SELECT * FROM transactions WHERE product_id=:product_id ORDER BY amount DESC LIMIT 1");
        $stmt->execute(['product_id' => $productId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>