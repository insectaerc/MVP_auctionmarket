
  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="mvc/views/frontend/style.css" rel="stylesheet" type="text/css">

    <title>Admin</title>
</head>

<body>

    <?php include 'mvc/views/frontend/navadmin.php';?>
    <br> </br>

    <h1 align="center" style="color:Peru"; > Customers Information </h1>
    
    <div class='mx-5 my-3'>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Account Balance</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- // CODE HIỂN THỊ CUSTOMERS -->
                <?php foreach ($data as $entry){ ?>

                <!-- EDIT FUNCTION -->
                <div class="modal" id="editModal<?php echo $entry['customer_id'] ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Form</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                            <form action="/MVP_auctionmarket/admin/edit/<?php echo $entry['customer_id']?>" method="post">
                                <div class="modal-body">
                                    <fieldset>
                                        <legend>Account Balance</legend>
                                        <div class="form-group row">
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control-plaintext" id="customer_id" name="customer_id" value="<?php echo $entry['customer_id'] ?>" hidden>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="balance" class="col-sm-4 col-form-label">Balance</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control-plaintext" id="balance" name="balance" value="<?php echo $entry['balance'] ?>">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="modal-footer">
                                    <a href="/MVP_auctionmarket/admin/edit/<?php echo $entry['customer_id'] ?>" class='text-decoration-none'>
                                        <button type="submit" class="btn btn-warning">Save</button>
                                    </a>
                                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- DELETE FUNCTION -->
                <div class="modal" id="deleteModal<?php echo $entry['customer_id'] ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Caution</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete the account with ID: "<?php echo $entry['customer_id'] ?>"</p>
                            </div>
                            <div class="modal-footer">
                                <a href="/MVP_auctionmarket/admin/delete/<?php echo $entry['customer_id']?>" class='text-decoration-none'>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <tr>
                    <td> <?php echo $entry['customer_id']; ?></td>
                    <td><?php echo $entry['email']; ?></td>
                    <td><?php echo $entry['phone']; ?></td>
                    <td><?php echo "$", $entry['balance']; ?></td>
                    <td>
                        <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#editModal<?php echo $entry['customer_id']?>' data-toggle='tooltip' data-placement='bottom' title='Edit Information'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg>
                        </button> 
                        <button type='button' class='btn btn-outline-warning' data-toggle='modal' data-target='#deleteModal<?php echo $entry['customer_id'] ?>' data-toggle='tooltip' data-placement='bottom' title='Delete Item'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg>
                        </button>
                    </td>
        
                </tr>
                <?php } ?>

            </tbody>
        </table>
</body>
    
</html>
    