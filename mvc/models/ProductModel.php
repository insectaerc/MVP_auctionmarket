<?php
//require 'mvc/views/frontend/customers/login.php';
class ProductModel extends MongoDatabase
{
    protected $connect;
    protected $collection;


    public function __construct()
    {
        $this->connect = parent::connect();
        $this->collection = $this->connect->auctionmarket->products;

        //check if available products's closingTime is over. If true, set to isAvailable to false
        $productArr = $this->getAvailableProducts();
        foreach ($productArr as $product) {
            if (strtotime(date_default_timezone_get()) >= strtotime($product['closingTime'])) {
                $this->collection->updateOne(['_id' => $product['_id']], ['$set' => ['isAvailable' => false]]);
            }
        }
    }


    public function getAll()
    {
        $result = $this->collection->find();
        $data = [];
        foreach ($result as $entry) {
            array_push($data, $entry);
        }
        return $data;
    }

    public function getAvailableProducts()
    {
        $result = $this->collection->find(['isAvailable' => true]);
        $data = [];
        foreach ($result as $entry) {
            array_push($data, $entry);
        }
        return $data;
    }

    public function findProductsWonByACustomer($customerID)
    {
        $result = $this->collection->find(['winnerID' => $customerID, 'isAvailable' => false]);
        $data = [];
        foreach ($result as $entry) {
            array_push($data, $entry);
        }
        return $data;
    }

    public function findProduct($id)
    {
        $result = $this->collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
        $data = [];
        array_push($data, $result);
        return $data;
    }

    public function findCustomerProduct($ownerIdentifier)
    {
        $result = $this->collection->find(['ownerID' => $ownerIdentifier]);
        $data = [];
        foreach ($result as $entry) {
            array_push($data, $entry);
        }
        return $data;
    }

    public function findClassifiedProduct($limit, $orderBy, $ascOrDesc)
    {
        $result = $this->collection->find(['isAvailable' => true], ['projection' => ['name' => 1, 'closingTime' => 1, 'minBid' => 1, 'highestBid' => 1, 'bidNum' => 1], 'limit' => $limit, 'sort' => [$orderBy => $ascOrDesc]]);
        $data = [];
        foreach ($result as $entry) {
            array_push($data, $entry);
        }
        return $data;
    }

    public function store($name, $minBid, $closingTime, $description, $ownerID)
    {
        $minBid = (float)$minBid;
        $insertOneResult = $this->collection->insertOne([
            'name' => $name,
            'minBid' => $minBid,
            'closingTime' => $closingTime,
            'description' => $description,
            'bidNum' => 0,
            'highestBid' => $minBid,
            'ownerID' => $ownerID,
            'isAvailable' => true,
            'winnerID' => null
        ]);
        $this->uploadProductImage($name);
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function update($productID, $name, $minBid, $closingTime)
    {
        $this->collection->updateOne(['_id' => new MongoDB\BSON\ObjectId($productID)], ['$set' => ['name' => $name, 'minBid' => $minBid, 'closingTime' => $closingTime]]);
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function updateBidding($productID, $bidNum, $highestBid, $winnerID)
    {
        $this->collection->updateOne(['_id' => new MongoDB\BSON\ObjectId($productID)], ['$set' => ['bidNum' => $bidNum, 'highestBid' => $highestBid, 'winnerID' => $winnerID]]);
    }

    public function destroy($productID)
    {
        $this->collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($productID)]);
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function isset_file($file)
    {
        return (isset($file) && $file['error'] != UPLOAD_ERR_NO_FILE);
    }
    function uploadProductImage($id)
    {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["productAvatar"]["name"]);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        if (!$this->isset_file($_FILES['productAvatar'])) {
            // It's not empty
            echo "<div class='alert alert-dismissible alert-warning mt-5'>";
            echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
            echo "<h4 class='alert-heading'>We are sorry!</h4>";
            echo "<p class='mb-0'>The file input is empty.</p>";
            echo "</div>";
            return;
        }

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["productAvatar"]["tmp_name"]);
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {

            echo "<div class='alert alert-dismissible alert-warning mt-5'>";
            echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
            echo "<h4 class='alert-heading'>We are sorry!</h4>";
            echo "<p class='mb-0'>The file is not an image file.</p>";
            echo "</div>";
            return;
            $uploadOk = 0;
        }



        // Check if file already exists
        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // // Check file size
        // if ($_FILES["productAvatar"]["size"] > 500000) {        
        //     echo "<div class='alert alert-dismissible alert-warning mt-5'>";
        //     echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
        //     echo "<h4 class='alert-heading'>We are sorry!</h4>";
        //     echo "<p class='mb-0'>The file is too large.</p>";
        //     echo "</div>";
        //     return;
        //     $uploadOk = 0;
        // }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "<div class='alert alert-dismissible alert-warning mt-5'>";
            echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
            echo "<h4 class='alert-heading'>We are sorry!</h4>";
            echo "<p class='mb-0'>Only JPG, JPEG, PNG & GIF files are allowed.</p>";
            echo "</div>";
            return;
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<div class='alert alert-dismissible alert-warning mt-5'>";
            echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
            echo "<h4 class='alert-heading'>We are sorry!</h4>";
            echo "<p class='mb-0'>Your file is not uploaded.</p>";
            echo "</div>";
            return;
            // if everything is ok, try to upload file
        } else {
            $fileName = $_FILES["productAvatar"]["name"];
            $tmp = explode(".", $fileName);
            $ext = end($tmp);
            if (move_uploaded_file($_FILES["productAvatar"]["tmp_name"], "upload/{$id}.{$ext}")) {
                //echo "The file " . htmlspecialchars(basename($_FILES["productAvatar"]["name"])) . " has been uploaded.";
            } else {
                echo "<div class='alert alert-dismissible alert-warning mt-5'>";
                echo "<button type='button' class='btn-close' data-dismiss='alert'></button>";
                echo "<h4 class='alert-heading'>We are sorry!</h4>";
                echo "<p class='mb-0'>Sorry, there was an error uploading your image.</p>";
                echo "</div>";
                return;
            }
        }
    }
}
