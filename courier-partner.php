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
        <h3 class="heading mt-3 ms-4">SET COURIER PARTNER PRIORITY</h3>
        <div class="row fields-instruction">
          <div class="col-auto fields-report">
            <div class="main-area ms-4">

              <div class="checkboxes">
                <div class="col-md-2 mt-4 form-check form-check-inline long-label">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                  <label class="form-check-label no-space-break" for="inlineRadio1"><img class="blue-logo" src="images/Bhejooo-Logo.png" alt="" width="90%"><p class="italic-text" style="display: inline-block;">(Recommended)</p></label>
                  <p class="sub-text-radio">Courier partner selection is based on AI recommendation to optimise shipping charges and reduce RTO</p>
                </div>
                <div class="col-md-2 form-check form-check-inline ms-5 checkbox-2">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                  <label class="form-check-label no-space-break custom-prio-label" for="inlineRadio2">Custom Priority</label>
                  <p class="sub-text-radio">Drag & drop cards to set your own priority <br><br><br></p>
                </div>
              </div>

            <p class="italic-text" style="display: inline-block;">These priority settings will only be used in bulk shipping for Forward orders.</p>
            <!-- <button type="button" class="btn btn-primary btn-connect mt-2">DOWNLOAD</button> -->

            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
