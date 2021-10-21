<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

  <div class="row">

    <!-- Main-Image Section -->

    <div class="col-lg-6 bgImage">
      <div class="row Main-img-text">
        <div class="col-lg-6 verti-align">
          <h1 class="main-text-bhejooo one-line-text  txt-color">BHEJOOO</h1>
        </div>
        <div class="col-lg-6 verti-align">
          <p class="sub-text-login one-line-text txt-color">Your favourite courier partner</p>
        </div>
      </div>
    </div>

    <div class="col-lg-6">

      <div class="container-fluid">
        <img class="logo-signup" src="https://www.staging.bhejooo.com/wp-content/uploads/2021/09/Bhejooo-Logo.png" class="logo" alt="">
        <h1 class="login-title">REGISTER</h1>

        <!-- Input-Groups -->

        <div class="input-group mb-3">
          <input type="text" class="form-control fields-signup left-field calc-input" placeholder="Name*">
          <input type="text" class="form-control fields-signup right-field calc-input" placeholder="Company Name">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control fields-signup left-field calc-input" placeholder="Phone*">
          <input type="text" class="form-control fields-signup right-field calc-input" placeholder="Email Address*">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control fields-signup left-field calc-input" placeholder="Password*">
          <input type="password" class="form-control fields-signup right-field calc-input" placeholder="Confirm Password*">
        </div>
        <div class="input-group mb-3">
          <label class="form-control label-orders fields-signup" style="color:#989898; border:none; font-size:0.9rem;">Monthly Orders</label>
            <select class="form-select form-select-sm order-qty-select right-field">
              <option selected style="text-align:center; color:#989898;">0-100</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
        </div>

        <button type="button" class="btn btn-primary signup-btn">REGISTER</button> <br>

        <p class="create-acc top-spacing" href="">Already have an account?</p>

      </div>

      <footer>
        <p>Copyright 2021 © Powered by <strong>Digitotal</strong></p>
      </footer>

    </div>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
