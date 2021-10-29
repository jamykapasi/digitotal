      <div class="col py-3 content">
        <h3 class="heading mt-3 ms-4">REPORTS</h3>
        <div class="row fields-instruction">
          <div class="col-auto fields-report">
            <div class="main-area ms-4">

              <div class="btn-group mt-3">
                <!-- <button class="btn report-btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Report Period
                </button> -->
                 <h5 class="heading mt-1 ms-1">Report Period</h5>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
              <form class="report" id="report" action="<?php echo SITE_URL."report"?>" method="post" enctype="multipart/form-data">
                <div class="checkboxes">
                  <div class="col-md-2 mt-4 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="order" id="order" value="order">
                    <label class="form-check-label no-space-break" for="inlineRadio1">Order Report</label>
                  </div>
                  <div class="col-md-2 form-check form-check-inline long-label">
                    <input class="form-check-input" type="radio" name="order" id="weight" value="weight" disabled>
                    <label class="form-check-label no-space-break" for="inlineRadio2">Weight Discrepancy Report</label>
                  </div>
                  <div class="col-md-2 form-check form-check-inline long-label-2">
                    <label class="form-check-label no-space-break" for="inlineRadio1">Payment Report</label>
                    <input class="form-check-input" type="radio" name="order" id="payment" value="payment">
                  </div>
                  <div class="col-md-2 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="order" id="recharge" value="recharge" disabled>
                    <label class="form-check-label no-space-break" for="inlineRadio2">Recharge Report</label>
                  </div>
                </div>

                <input class="form-control" type="hidden" name="action" id="action" value="downloadReport">
                <button type="submit" id="download" name="download" value="csv" class="btn btn-primary btn-connect mt-4">DOWNLOAD</button>
                <!-- <a href="javascript:void(0)" id="dlbtn" style="display: none;">
                  <button type="button" id="mine" name="download" class="btn btn-primary btn-connect mt-4">DOWNLOAD</button>
                </a> -->
              </form>
             <!--  <h3 class="heading mt-4">INTEGRATE YOUR STORE</h3>
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

<script type="text/javascript">
  $(document).on("submit",".report",function(){
      $(".report").validate({
        ignore: [],
        errorClass: 'help-block',
        errorElement: 'span',
        rules: {
          order:{required:true},
        },
        messages: {
          order:{required:"Please  enter  pincode."},
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
      if ($(".report").valid()) {
          return true;
      } else {
          return false;
      }
  });
  // $(document).on("click","#download",function() {
      
  //     var action   = $("#action").val();
  //     var order    = $("#order:checked").val();
  //     var weight   = $("#weight:checked").val();
  //     var payment  = $("#payment:checked").val();
  //     var recharge = $("#recharge:checked").val();

  //     $.ajax({
  //         type:"POST",
  //         dataType : 'json',
  //         url: window.location,
  //         data : {"action":action,order,weight,payment,recharge},
  //         contentType: 'text/csv' 
  //         success: function(res)
  //         {
  //            window.open(res.filename);
  //         }
  //     });
  // });

</script>