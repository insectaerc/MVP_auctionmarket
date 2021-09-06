<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include 'mvc/views/frontend/nav.php';
    ?>
    <div class='mx-3'>
        <div class='row'>
            <div class='col-8'>
                <div class="card border-primary mb-3">
                    <div class="card-header h3">Bidding History</div>
                    <div class="card-body">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Datetime</th>
                                </tr>
                            </thead>
                            <tbody>
                                <a href=""></a>
                                <?php
                                foreach ($data as $entry){
                                    $productArray = $productModel->findProduct($entry['product_id']);
                                    $product = $productArray[0];
                                ?>
                                <tr class='table-secondary'>
                                    <td>
                                        <a href='/MVP_auctionmarket/product/detail/<?php echo $entry['product_id'] ?>'>
                                            <button type='button' class='btn btn-secondary' data-toggle='tooltip' data-placement='bottom' title='Click for detail'><?php echo $product['name']; ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td><?php echo '$'.number_format($entry['amount'],2) ?></td>
                                    <td><?php echo date('Y-m-d H:i:s', strtotime((string)$entry['createdAt']))?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class='col-4'>
                <div class="card text-white bg-success mb-3">
                    <div class="card-header h3">Won bid</div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>