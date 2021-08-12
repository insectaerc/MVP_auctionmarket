<?php
class ProductModel extends MongoDatabase{
    protected $connect;
    protected $collection;


    public function __construct(){
        $this->connect = parent::connect();
        $this->collection = $this->connect->auctionmarket->products;
    }


    public function getAll(){
        $result = $this->collection->find( [] );
        $data = [];
        foreach ($result as $entry) {
            array_push($data, $entry);
        }
        return $data;
    }

    public function findProduct($id){
        $result = $this->collection->findOne(['name' => $id]);
        $data = [];
            array_push($data, $result);
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