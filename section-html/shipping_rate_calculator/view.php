
<div class="col py-3 content">
  <div class="row fields-instruction mt-4">
    <div class="col-auto fields-rate-calc">
      <div class="ms-4">
        <h3 class="heading-calc mt-4">CALCULATE SHIPPING RATES</h3>
      </div>
        <form id="ratecCalculte" class="ratecCalculte" method="post" action="">
          <div class="input-group mb-3 ms-2 row w-75">
            <div class="col-lg-6">
              <input type="text" class="form-control calc-input" name="pickup_pincode" id="pickup_pincode" placeholder="Pickup Pin Code">
            </div>
            <div class="col-lg-6">
              <input type="text" class="form-control calc-input" name="drop_code" id="drop_pincode" placeholder="Drop Pin Code">
            </div>
          </div>
          <div class="row ms-2">
            <div class="col-md-6">
              <label for="inputCity" class="form-control form-label label-text">Package Dead Weight:</label>
            </div>

            <div class="col-lg-3">
              <div class="calc-input-content">                    
                <input type="text" class="form-control calc-input" name="package_dead_weight" id="package_dead_weight"placeholder="" value="">
                <label for="inputkg" class="form-label">kgs</label>
              </div>
            </div>

            <p class="italic-text italic-rate-calc">The minimum chargeable weight is 0.5kgs</p>

            <div class="col-md-6">
              <label for="" class="form-control form-label label-text">Payment Mode:</label>
            </div>

            <div class="col-md-3 form-check form-check-inline">
              <input class="form-check-input" type="radio" name="payment_mode" id="option1" value="cod">
              <label class="form-check-label label-text" for="prepaid">COD</label>
            </div>

            <div class="col-md-3 form-check form-check-inline">
              <input class="form-check-input" type="radio" name="payment_mode" id="option2" value="prepaid">
              <label class="form-check-label label-text" for="prepaid">Prepaid</label>
            </div>
          </div>
          <button type="button" class="btn btn-primary btn-connect ms-4" id="calculte">CALCULATE</button> <br>
          <div class="col-md-3 " id="finalCalculte" style="padding: 15px 30px; width: 100%">
                
          </div>
        </form>  
    </div>
          <div class="col-auto instruction-rate-calc">
            <form id="pincodeDwn" class="pincodeDwn" action="{SITE_URL}shipping_rate_calculator" method="post">
              <h3 class="heading-calc mt-4">DOWNLOAD SERVICABLE PINCODE LIST</h3>
                <div class="input-group mb-3 w-100 ms-2 row">
                  <div class="col">
                    <input type="text" class="form-control calc-input" id="pickup_pincode" name="pickup_pincode" placeholder="Pickup Pin Code">
                  </div>
                  <div class="col">
                    <input type="hidden" name="action" value="downloadPincode">
                    <button type="submit" name="dwnpincode" value="pincodeDownload" class="btn btn-primary btn-connect mt-2">DOWNLOAD</button> <br>
                    <!-- <input type="text" class="form-control" placeholder="Drop Pin Code"> -->
                  </div>
                </div>
            </form> 
          </div>
          <div class="col py-3 content table-rates">
          </div>
      </div>
    </div>
  </div>
</div>
        

  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript">

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
            data : {"action":"shippingRateCalculate",pickup_pincode,drop_pincode,package_weight,payment_mode},
            success: function(res)
            {
              if (res.status==1)
              {
                $("#finalCalculte").html(res.finalPrice);
                $(".table-rates").html(res.shippingTable);
              }
              else
              {
                $("#finalCalculte").html(res.error);
              } 
            }
        });   
  });

  $(document).on("submit",".ratecCalculte",function(){
    $(".ratecCalculte").validate({
      ignore: [],
      errorClass: 'help-block',
      errorElement: 'span',
      rules: {
        pickup_pincode:{required:true,digits: true},
        drop_pincode:{required:true,digits: true},
        package_dead_weight:{required:true},
      },
      messages: {
        pickup_pincode:{required:"Please enter valid pincode."},
        drop_pincode:{required:"Please  enter valid pincode."},
        package_dead_weight:{required:"numbers only"},
      },
      highlight: function (element) {
          $(element).closest('form-check-input').addClass('has-error');
      },
      unhighlight: function (element) {
          $(element).closest('form-check-input').removeClass('has-error');
      },
      errorPlacement: function (error, element) {
        if(element.attr('id') == 'order'){
            error.insertAfter(element.closest('.form-check-label'));
        }else{
            error.insertAfter(element.closest('.form-check-label'));
        }
      }
    });
    if ($(".ratecCalculte").valid()) {
        return true;
    } else {
        return false;
    }
  });

  //  $(document).on("submit",".pincodeDwn",function(){
  //   $(".pincodeDwn").validate({
  //     ignore: [],
  //     errorClass: 'help-block',
  //     errorElement: 'span',
  //     rules: {
  //       pickup_pincode:{required:true,digits: true},
  //     },
  //     messages: {
  //       pickup_pincode:{required:"Please enter valid pincode."},
  //     },
  //     highlight: function (element) {
  //         $(element).closest('form-control').addClass('has-error');
  //     },
  //     unhighlight: function (element) {
  //         $(element).closest('form-control').removeClass('has-error');
  //     },
  //     errorPlacement: function (error, element) {
  //       if(element.attr('id') == 'pickup_pincode'){
  //           error.insertAfter(element.closest('.form-control'));
  //       }else{
  //           error.insertAfter(element.closest('.form-control'));
  //       }
  //     }
  //   });
  //   if ($(".pincodeDwn").valid()) {
  //       return true;
  //   } else {
  //       return false;
  //   }
  // });

</script>