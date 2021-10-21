<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="css/styles.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<?php  include("inc/header.php"); ?>  

<?php  include("inc/sidebar.php"); ?>

      <div class="col py-3 content">
        <h3 class="heading mt-3 ms-4">REPORTS</h3>
        <div class="row fields-instruction">
          <div class="col-auto fields-report">
            <div class="main-area ms-4">

              <div class="btn-group mt-3">
                <button class="btn report-btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Report Period
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>

              <div class="checkboxes">
                <div class="col-md-2 mt-4 form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                  <label class="form-check-label no-space-break" for="inlineRadio1">Order Report</label>
                </div>
                <div class="col-md-2 form-check form-check-inline long-label">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                  <label class="form-check-label no-space-break" for="inlineRadio2">Weight Discrepancy Report</label>
                </div>
                <div class="col-md-2 form-check form-check-inline long-label-2">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                  <label class="form-check-label no-space-break" for="inlineRadio1">Payment Report</label>
                </div>
                <div class="col-md-2 form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                  <label class="form-check-label no-space-break" for="inlineRadio2">Recharge Report</label>
                </div>
              </div>

            <button type="button" class="btn btn-primary btn-connect mt-4">DOWNLOAD</button>

              <!-- <h3 class="heading mt-4">INTEGRATE YOUR STORE</h3>
                  <img src="shopify.png" alt="" width="100%" class="shopify mt-4">
                  <p class="sub-heading">Enter your store details to get started</p>
                </div>
                <div class="input-group mb-3 top-input w-75 ms-4">
                  <input type="text" class="form-control" placeholder="Store Name | eg: myfashionkart">
                </div>
                <div class="input-group mb-3 w-75 ms-4">
                  <input type="text" class="form-control" placeholder="Store URL | eg: myshop.myshopify.com">
                </div>
                <button type="button" class="btn btn-primary btn-connect ms-4">CONNECT</button> <br> -->
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
