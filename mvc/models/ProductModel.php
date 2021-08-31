<?php
class ProductModel extends MongoDatabase{
    protected $connect;
    protected $collection;


    public function __construct(){
        $this->connect = parent::connect();
        $this->collection = $this->connect->auctionmarket->products;
    }


    public function getAll(){
        $result = $this->collection->find();
        $data = [];
        foreach ($result as $entry) {
            array_push($data, $entry);
        }
        return $data;
    }

    public function findProduct($id){
        $result = $this->collection->findOne(['_id'=> new MongoDB\BSON\ObjectId($id)]);
        $data = [];
        array_push($data, $result);
        return $data;
    }

    public function findCustomerProduct($ownerIdentifier){
        $result = $this->collection->find(['ownerID'=>$ownerIdentifier]);
        $data = [];
        foreach ($result as $entry) {
            array_push($data, $entry);
        }
        return $data;
    }

    public function findClassifiedProduct($limit, $orderBy, $ascOrDesc){
        $result = $this->collection->find([], ['projection'=>['name'=>1, 'closingTime'=>1,'minBid'=>1, 'highestBid'=>1, 'bidNum'=>1],'limit'=>$limit,'sort'=>[$orderBy=>$ascOrDesc]]);
        $data = [];
        foreach ($result as $entry) {
            array_push($data, $entry);
        }
        return $data;
    }

    public function store($name, $minBid, $closingTime, $ownerID){
        $minBid = (double)$minBid;
        $insertOneResult = $this->collection->insertOne([
            'name' => $name,
            'minBid' => $minBid,
            'closingTime' => $closingTime,
            'bidNum'=> 0,
            'highestBid'=> $minBid,
            'ownerID' => $ownerID
        ]);
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function update($productID, $name, $minBid, $closingTime){
        $this->collection->updateOne(['_id'=> new MongoDB\BSON\ObjectId($productID)], ['$set'=>['name'=>$name, 'minBid'=>$minBid, 'closingTime'=>$closingTime]]);
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function updateBidding($productID, $bidNum, $highestBid){
        $this->collection->updateOne(['_id'=> new MongoDB\BSON\ObjectId($productID)], ['$set'=>['bidNum'=>$bidNum, 'highestBid'=>$highestBid]]);
    }
    
    public function destroy($productID){
        $this->collection->deleteOne(['_id'=> new MongoDB\BSON\ObjectId($productID)]);
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>