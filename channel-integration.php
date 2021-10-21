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
            <div class="col-auto fields">
                <div class="heading-icon ms-4">
                  <h3 class="heading mt-4">INTEGRATE YOUR STORE</h3>
                  <img src="shopify.png" alt="" width="100%" class="shopify mt-4">
                  <p class="sub-heading">Enter your store details to get started</p>
                </div>
                <div class="input-group mb-3 top-input w-75 ms-4">
                  <input type="text" class="form-control store-input calc-input" placeholder="Store Name | eg: myfashionkart">
                </div>
                <div class="input-group mb-3 w-75 ms-4">
                  <input type="text" class="form-control store-input calc-input" placeholder="Store URL | eg: myshop.myshopify.com">
                </div>
                <button type="button" class="btn btn-primary btn-connect ms-4">CONNECT</button> <br>
            </div>
            <div class="col-auto instruction">
                <h3 class="heading mt-4">INSTRUCTIONS</h3>
                <p class="points">1. Please enter your Shopify store URL.</p>
                <p class="points">2. You'll be taken to a page within Shopify where you'll need to approve the permissions that Bhejooo needs to operate (i.e. import your orders, update order status, etc.). You must click on "Approve".</p>
                <p class="points">3. Once you approve the connection, you will be redirected back to Bhejooo Panel.</p>
                <p class="points">4. You will see a green tick with message "Store Linked Successfully"</p>
                <p class="points">5. Going ahead, all your Shopify orders will reflect in Manage Orders section under To be processed tab</p>
              </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
