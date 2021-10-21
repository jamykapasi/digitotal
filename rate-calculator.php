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
        <div class="row fields-instruction mt-4">
          <div class="col-auto fields-rate-calc">
            <div class="ms-4">
              <h3 class="heading-calc mt-4">CALCULATE SHIPPING RATES</h3>
            </div>

            <div class="input-group mb-3 ms-2 row w-75">
              <div class="col-lg-6">
                <input type="text" class="form-control calc-input" placeholder="Pickup Pin Code">
              </div>
              <div class="col-lg-6">
                <input type="text" class="form-control calc-input" placeholder="Drop Pin Code">
              </div>
            </div>

            <div class="row ms-2">
              <div class="col-md-6">
                <label for="inputCity" class="form-control form-label label-text">Package Dead Weight:</label>
              </div>
              <div class="col-md-2">
                <input type="number" class="form-control ms-0 calc-input" placeholder="">
              </div>
              <div class="col-md-2">
                <label for="inputkg" class="form-control form-label label-text">kgs</label>
              </div>

              <p class="italic-text italic-rate-calc">The minimum chargeable weight is 0.5kgs</p>

              <div class="col-md-6">
                <label for="" class="form-control form-label label-text">Payment Mode:</label>
              </div>
              <div class="col-md-3 form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label label-text" for="inlineRadio1">COD</label>
              </div>
              <div class="col-md-3 form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label label-text" for="inlineRadio2">Prepaid</label>
              </div>
            </div>
            <button type="button" class="btn btn-primary btn-connect ms-4">CALCULATE</button> <br>
          </div>
          <div class="col-auto instruction-rate-calc">
            <h3 class="heading-calc mt-4">DOWNLOAD SERVICABLE PINCODE LIST</h3>

            <div class="input-group mb-3 w-100 ms-2 row">
              <div class="col">
                <input type="text" class="form-control calc-input" placeholder="Pickup Pin Code">
              </div>
              <div class="col">
                <button type="button" class="btn btn-primary btn-connect mt-2">DOWNLOAD</button> <br>
                <!-- <input type="text" class="form-control" placeholder="Drop Pin Code"> -->
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
