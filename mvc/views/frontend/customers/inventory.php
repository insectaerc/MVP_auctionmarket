<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
</head>

<body>
    <?php
        include 'mvc/views/frontend/nav.php';
    ?>

    <!-- ADD PRODUCT TO SELL -->
    <div class='mx-5'>
        <div class='text-center'>
            <button type="button" class="btn btn-success" data-toggle='modal' data-target='#sellModal' data-toggle='tooltip' data-placement='bottom' title='Add product to sell'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16"><path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/></svg> Create New Deal <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16"><path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                </svg>
            </button>
        </div>
            
    </div>
    <div class="modal" id="sellModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Selling Form</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                    </button>
                </div>
                <form action="/MVP_auctionmarket/product/add" method="post">
                    <div class="modal-body">
                        <fieldset>
                            <legend>Item Information</legend>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext" id="name" name="name" placeholder="Enter item's name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="minPrice" class="col-sm-4 col-form-label">Minimum Bid</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext" id="minPrice" name="minPrice" placeholder="Enter item's minimum bid" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="closingTime" class="col-sm-4 col-form-label">Close On</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext" id="closingTime" name="closingTime" placeholder="Ending time for the deal">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Confirm</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Item Table -->
    <div class='mx-5 my-3'>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Close On</th>
                <th scope="col">Minimum Bid</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $entry){
                ?>
                    <!-- EDIT Modals -->
                    <div class="modal" id="editModal<?php echo $entry['_id'] ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Form</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                    </button>
                                </div>
                                <form action="/MVP_auctionmarket/product/update/<?php echo $entry['_id']?>" method="post">
                                    <div class="modal-body">
                                        <fieldset>
                                            <legend>Item Information</legend>
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control-plaintext" id="name" name="name" value="<?php echo $entry['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="minPrice" class="col-sm-4 col-form-label">Minimum Bid</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control-plaintext" id="minPrice" name="minPrice" value="<?php echo $entry['minPrice'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="closingTime" class="col-sm-4 col-form-label">Close On</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control-plaintext" id="closingTime" name="closingTime" value="<?php echo $entry['closingTime'] ?>">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/MVP_auctionmarket/product/update/<?php echo $entry['_id'] ?>" class='text-decoration-none'>
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- DELETE Modals -->
                    <div class="modal" id="deleteModal<?php echo $entry['_id'] ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Caution</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete "<?php echo $entry['name'] ?>"</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="/MVP_auctionmarket/product/delete/<?php echo $entry['_id']?>" class='text-decoration-none'>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rows of Item -->
                    <tr class='table-secondary'>
                        <td scope='row'>
                            <a href='/MVP_auctionmarket/product/detail/<?php echo $entry['_id'] ?>'>
                                <button type='button' class='btn btn-secondary' data-toggle='tooltip' data-placement='bottom' title='Click for detail'><?php echo $entry['name'] ?>
                                </button>
                            </a>
                        </td>
                    <td><?php echo $entry['closingTime'] ?></td>
                    <td><?php echo $entry['minPrice'] ?></td>
                    <td>
                        <button type='button' class='btn btn-info' data-toggle='modal' data-target='#editModal<?php echo $entry['_id']?>' data-toggle='tooltip' data-placement='bottom' title='Edit Information'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg>
                        </button> 
                        <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal<?php echo $entry['_id'] ?>' data-toggle='tooltip' data-placement='bottom' title='Delete Item'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg>
                        </button>
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</body>

</html>