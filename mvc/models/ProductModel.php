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

    public function findClassifiedProduct($limit, $orderBy, $ascOrDesc){
        $result = $this->collection->find([], ['projection'=>['name'=>1, 'closingTime'=>1,'maxBid'=>1, 'bidNum'=>1],'limit'=>$limit,'sort'=>[$orderBy=>$ascOrDesc]]);
        $data = [];
        foreach ($result as $entry) {
            array_push($data, $entry);
        }
        return $data;
    }

    public function store(){
        $insertOneResult = $this->collection->insertOne([
            'name' => '5 mins of being God',
            'minPrice' => '9999999999',
            'closingTime' => '2021-12-12',
        ]);
    }
    public function update(){

    }
    public function destroy(){

    }
}
?>