<body class="notification-content">

<div class="col py-3 content">
      <form id="ratecCalculte" method="post" action="">
        <div class="row fields-instruction mt-4">
            <div class="col-auto fields-rate-calc">
              <div class="ms-4">
                <h3 class="heading-calc mt-4">CALCULATE SHIPPING RATES</h3>
              </div>

              <div class="input-group mb-3 ms-2 row w-75">
                <div class="col-lg-6">
                  <input type="text" class="form-control calc-input" id="pickup_pincode" placeholder="Pickup Pin Code">
                </div>
                <div class="col-lg-6">
                  <input type="text" class="form-control calc-input" id="drop_pincode" placeholder="Drop Pin Code">
                </div>
              </div>

              <div class="row ms-2">
                <div class="col-md-6">
                  <label for="inputCity" class="form-control form-label label-text">Package Dead Weight:</label>
                </div>
                <div class="col-md-2">
                  <input type="number" class="form-control ms-0 calc-input" id="package_dead_weight"placeholder="">
                </div>
                <div class="col-md-2">
                  <label for="inputkg" class="form-control form-label label-text">kgs</label>
                </div>

                <p class="italic-text italic-rate-calc">The minimum chargeable weight is 0.5kgs</p>

                <div class="col-md-6">
                  <label for="" class="form-control form-label label-text">Payment Mode:</label>
                </div>
                <div class="col-md-3 form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="payment_mode" id="option1" value="prepaid">
                  <label class="form-check-label label-text" for="prepaid">COD</label>
                </div>
                <div class="col-md-3 form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="payment_mode" id="option2" value="prepaid">
                  <label class="form-check-label label-text" for="prepaid">Prepaid</label>
                </div>
              </div>
              <button type="button" class="btn btn-primary btn-connect ms-4" id="calculte">CALCULATE</button> <br>
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
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<script type="text/javascript">
  // $(document).on("click","#calculte",function() {
  //   var pickup_pincode = $('#pickup_pincode').val();
  //   var drop_pincode = $('#drop_pincode').val();

  //   alert(getValue);
  // });

  $(document).on('click','#calculte',function()
    {   
       var pickup_pincode = $('#pickup_pincode').val();
       var drop_pincode   = $('#drop_pincode').val();
       var package_weight = $('#package_dead_weight').val();
       var payment_mode   = $("input[name='payment_mode']:checked").val();

        $.ajax({
            type:"POST",
            dataType : 'json',
            url: window.location,
            data : {"action":"shippingRateCalculate",pickup_pincode,drop_pincode,package_weight},
            success: function(res)
            {
               //$(".main_div").append(res.InstructionText);
            }
        });   
    });
</script>