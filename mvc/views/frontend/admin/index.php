<!DOCTYPE html>
<html lang="en">
<style>
.container{
        background-color: slategray;
        margin: 3em auto;
        border-radius: 2em;
        height: 700px;
        weight: 500px;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14)
  }
.btn-primary{
  background-color: slategray;
}
  </style>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="mvc/views/frontend/style.css" rel="stylesheet" type="text/css">
    <title>Admin</title>
</head>
<?php 
        include 'mvc/views/frontend/navadmin.php';
    ?>
<body style="background-color:floralwhite">
<!-- //Customer Info Management -->
<div class="container" >
    <br> </br>
        <h1 align="center" style="color: inkwell"> ADMIN DASHBOARD </h1>
    <br> </br>
        <div id="accordion">
            <div class="card">
                <div class="accordion-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="accordion-button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color :inkwell">
                          Customer Info
                        </button>
                    </h5>
                </div>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="accordion-body">
                  Update customer's account balance
                              <br> </br>
                  <a href="/MVP_auctionmarket/admin/info"a>
                    <button class="btn btn-primary" name = "info_btn" type="button">Click here</button>
                  </a>
            </div>
        </div>
      </div>
  <div class="card">
    <div class="accordion-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="accordion-button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Transaction Info
        </button>
      </h5>
  </div>
  <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="accordion-body">
          The admin can see the total amount transacted between 2 time points (e.g. start time and end time)
          <br> </br>
          <a href="/MVP_auctionmarket/admin/trans"a>
        <button class="btn btn-primary" name = "transaction_btn" type="button">Click here</button>
          </a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="accordion-header" id="headingThree">
      <h5 class="mb-0">
        <button class="accordion-button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Transaction Management
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="accordion-body">
      The admin can “undo” a transaction, i.e., subtracting the transacted money from the seller and adding it to the winning bidder (this feature is used to minimize the number of frauds)
      </div>
    </div>
  </div>
</div>



    </body>
    
    </html>
    