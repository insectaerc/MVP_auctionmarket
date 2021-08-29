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
        $result = $this->collection->find([], ['projection'=>['name'=>1, 'closingTime'=>1,'maxBid'=>1, 'bidNum'=>1],'limit'=>$limit,'sort'=>[$orderBy=>$ascOrDesc]]);
        $data = [];
        foreach ($result as $entry) {
            array_push($data, $entry);
        }
        return $data;
    }

    public function store($name, $minPrice, $closingTime, $ownerID){
        $insertOneResult = $this->collection->insertOne([
            'name' => $name,
            'minPrice' => $minPrice,
            'closingTime' => $closingTime,
            'bidNum'=> null,
            'manBid'=> null,
            'ownerID' => $ownerID
        ]);
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function update($productID, $name, $minPrice, $closingTime){
        $this->collection->updateOne(['_id'=> new MongoDB\BSON\ObjectId($productID)], ['$set'=>['name'=>$name, 'minPrice'=>$minPrice, 'closingTime'=>$closingTime]]);
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    public function destroy($productID){
        $this->collection->deleteOne(['_id'=> new MongoDB\BSON\ObjectId($productID)]);
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>