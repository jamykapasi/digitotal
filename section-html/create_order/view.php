
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
.modal-content span {
    margin-right: unset;
}
.modal-backdrop.fade.show {
    margin : 0;
}
</style>

<div class="col content">
    <form class="bulkFile" id="bulkFile" action="{SITE_URL}create_order" method="post" enctype="multipart/form-data">
    <div class="head1">
         <h2 class="heading col-lg-7" style="letter-spacing: 2px; width: 38%;">CREATE NEW ORDERS</h2>
            <div class="create-order-file">
                <input type="file" class="form-control" name="file" id="file" accept=".csv">
                <button class="btn2 bulk col-lg-1 bulkUpload" id="btnFile" >BULK UPLOAD</button>
                <span class="selected-file-name"></span>
            </div>
            <button class="btn2 bulk col-lg-1" type="submit"  id="upload" name="upload"> UPLOAD</button>
    </div>
    </form>
    <div class="container col-lg-8">
        <div class="form-style form-popup">
            <form action="{SITE_URL}create_order" name="registerForm" method="post" id="registerForm" class="registerForm">
              <input type="hidden" name="action" value="submitOrderForm">
              <h4 class="part1">1.Create Order</h4>
              <h4 class="heading sub-heading">CUSTOMER DETAILS</h4>
              
              <table class="data">
                <tr>
                    <td class="for-column"><input type="text" name="customer_name" id="customer_name" class="input" placeholder="Name*" required/></td>
                    <td class="for-column"><input type="text" name="customer_phone" id="customer_phone" class="input" placeholder="Phone*" required/></td>
                    <td class="for-column"><input type="text"  name="customer_email" id="customer_email" class="input" placeholder="Email Address"></td>
                </tr>
                
                <tr>
                    <td class="for-column"><input type="text" name="customer_address" id="customer_address" class="input" placeholder="Address*" required/></td>
                    <td class="for-column"><input type="text" name="customer_pincode" id="customer_pincode" class="input" placeholder="PinCode*" required/></td>
                    <td class="for-column"><input type="text"  name="customer_city" id="customer_city" class="input" placeholder="City*" required/></td>
                </tr>
                
                <tr>
                    <td class="for-column"><input type="text" name="customer_state" id="customer_state" class="input" placeholder="State*" required/></td>
                    
                </tr>


                <tr><td class="for-column"><h4 class="heading order-details sub-heading">ORDER DETAILS</h4></td></tr>
                <tr>
                    <td class="for-column"><input type="text" name="product_name" id="product_name" class="input" placeholder="Product Name*" required/></td>
                    <td class="for-column"><input type="text" name="product_price" id="product_price" class="input" placeholder="Price(per unit item)*" required/></td>
                    <td class="qty2"><label class="qty-label">Qty</label><input type="text" name="product_qty" id="product_qty" class="qty" size="10">
                    <input type="text"  name="product_sku" id="product_sku" class="sku" placeholder="SKU"></td>
                </tr>

                <tr>
                    <td class="for-column"><select name="product_category_id" id="product_category_id" class="input" required>
                        <option value="">Product Category*</option>
                         #OPTION# 
                        </select>
                    </td>
                    
                    <td class="for-column"><label class="payment-label">Payment Mode*</label><input type="radio" name="payment_method" value="c"><label class="cod">COD</label>
                    <input type="radio" name="payment_method" value="p"><label class="cod">Prepaid</label>
                    </td>
                    
                </tr>

                <tr><td class="for-column"><button type="button" class="order_summary_click btn2 btn-next">Next</button></td></tr>
                
            </table>
        
        </div><br><br>

        <div class="form-style">
            <h4 class="part1">2.Select Pickup Address</h4>

            <h4 class="heading">PICKUP DETAILS</h4>
              <table class="data">

              <tr>
                  <!-- <td class="for-column"><select name="pickup_address_id" id="pickup_address_id" class="input" required>
                        <option value="">Select pickup address*</option>
                         #PICKUP_ADDRESS# 
                        </select>
                    </td> -->
                    <td class="for-column">
                      <label class="address-label">Select Address*</label><button type="button" data-toggle="modal" data-target="#exampleModalCenter"  class="btn2 select-btn">SELECT</button>
                  </td>
              </tr> 

            </table>
        </div><br><br>


        <div class="form-style">
            <h4 class="part1">3.Create Shipment</h4>
              <table class="data">
              <tr>
                  <td class="for-column">
                      <label class="package-label">Package Dead Weight*</label>
                      <input type="text" name="ship_pack_weight" id="ship_pack_weight" class="qty"required/>
                      <label class="qty-label">Kgs</label>
                    </td>
                    <td class="for-column">
                      <span style="font-style: italic;font-weight: bold; width: 80%;color: #153474;padding-top: 10px;">The minimum chargeable weight is 0.50kgs</span>
                  </td>
              </tr> 
              <tr>
                  <td class="for-column" style="display: flex;">
                      <label class="package-label">Volumetric Weight*</label>
                      <input type="text" name="volumetric_cm_1" id="volumetric_cm_1" class="qty" required/>
                      <label class="cm-label">cm</label>
                      <input type="text" name="volumetric_cm_2" id="volumetric_cm_2" class="qty" required/>
                      <label class="cm-label">cm</label>
                      <input type="text" name="volumetric_cm_3" id="volumetric_cm_3" class="qty" required/>
                      <label class="cm-label">cm</label>
                  </td>
              </tr> 
              <tr>
                    <td class="for-column"><select name="courier_partner" id="courier_partner" class="input" required>
                        <option value="">Select Courier Partner*</option>
                         #COURIER_PARTNER# 
                        </select></td>
                    
                    <td class="for-column pickup-date">
                        <div id="datepicker" class="input-group input-group2 date pickup datepicker " data-date-format="dd-mm-yyyy">
                        <input class="form-control filter1 " type="text" name="pickup_date" id="pickup_date" value="Pickup Date*" />
                        <span class="input-group-addon calendar"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div>
                    </td>
             </tr>
          </table>
        </div><br><br>

     
        <div class="form-style order_summary_section">
            <h4 class="part1">Order Summary</h4>
               <table class="data">
                <tr>
                    <td><label class="summary">Order ID:</label><input type="text" name="order-id" value="#NEW_ORDER_ID#" class="input2" disabled></td>
                    <td><label class="summary ext">Order Date & Time:</label><input type="text" id="summary_date" name="order-date-and-time" class="input2 date-time" value="N/A" disabled></td>
                    <td><label class="summary ext2">Order Total:</label><input type="text" id="summary_order_total"  name="order-total" value="₹ 200/-" class="input2"disabled></td>
                </tr>
                <tr>
                    <td><label class="summary">Paymode Mode:</label><input type="text"  name="order-total" value="COD" class="input2"disabled></td>
                </tr>
            </table>
            <hr>
            <table class="data">
                <tr>
                    <td>
                        <label class="summary">Customer Details:</label><input type="text" id="summary_address" name="cust-details" value="N/A" class="cust-details" disabled>

                    </td>
                </tr>
            </table>

                <hr>

            <table class="data">
                <tr>
                    <td><label class="summary">Product Name:</label><input type="text" id="summary_product_name" name="product-name1" value="N/A" class="input2" disabled></td>
                    <td><label class="summary">Price(per unit item):</label><input type="text" id="summary_product_unit_price" name="price1" class="input2" value="N/A" disabled></td>
                    <td><label class="summary">Qty:</label><input type="text" id="summary_product_qty" class="input2" name="Qty1" value="N/A"disabled></td>
                </tr>
                <tr><td><input type="hidden" name="shippment_charge" id="shippment_charge" value=""></td></tr>
                <tr><td><input type="hidden" name="cod_charges" id="cod_charges" value=""></td></tr>
                <tr><td><input type="hidden" name="pickup_address_id" id="pickup_address_id" value=""></td></tr>
                <tr><td><input type="hidden" name="total_price" id="total_price" value=""></td></tr>
                <tr><td><button type="submit" name="submitBtn" id="submitBtn" class="btn2 btn-next order-btn">PLACE ORDER</button></td></tr>
            </table>
            </form>  
    </div>
    <!-- Adress Select Modal  -->
    <div class="modal fade edit-record-modal select-address-modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-header border-0">
                        <span class="cross-circle1 close ms-auto" data-dismiss="modal">
                            <a href="#" class="cross-icon"> 
                            <i class="fas fa-times-circle"></i></a>
                        </span>
                    </div>
                    <h3 class="modal-title text-center w-100 m-0">SELECT PICKUP ADDRESS</h3>
                    <div class="row custfields style2 " style="margin-top: 5%;">
                        <label class="col-4" style="font-size:0.9rem;font-weight: 500;">Add New Address?</label>
                        <button class="btn2 btn-next update-btn btn-hv col-4" data-dismiss="modal" data-toggle="modal" data-target="#SelectModalCenter" style="    padding: 5px; width: 18%;margin: -5px 10px 0px auto;">SELECT</button>
                            #ADDRESS#
                        <button class="btn2 btn-next update-btn btn-hv col-4" data-dismiss="modal" data-toggle="modal" data-target="" style="width: 18%;margin: 20px auto 0px auto;">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Adreess Modal -->
    <div class="modal fade edit-record-modal" id="SelectModalCenter" tabindex="-1" role="dialog" aria-labelledby="SelectModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <span class="cross-circle1 close ms-auto" data-dismiss="modal">
                        <a href="#" class="cross-icon"> 
                        <i class="fas fa-times-circle"></i></a>
                    </span>
                </div>
                <form class="addAddress" id="addAddress" action="{SITE_URL}create_order" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text-center">
                            <h5 class="modal-title" >ADD NEW PICKUP ADDRESS</h5>
                            <div class="customer-details-content">
                                <div class="row">
                                     <div class="col col-12 col-md-6">
                                         <input type="text" id="name" name="name" class="form-control" placeholder="Full Name*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="text" id="phone_no" name="phone_no" class="form-control" placeholder="Phone*">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                         <input type="text" class="form-control" id="flat_no" name="flat_no" placeholder="Flat No.& Building Name*">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                         <input type="text" class="form-control" id="locality" name="locality" placeholder="Road, Locality">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                         <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Landmark*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="text" class="form-control" id="Pincode" name="pincode" placeholder="Pincode*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="text" class="form-control" id="area" name="area" placeholder="Area*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="checkbox"  id="SaveDefault"  name="default_address" style="margin-left: -30px;">
                                         <label for="SaveDefault">Save as default address</label>
                                     </div>
                                     <div class="col col-12 col-md-12">
                                        <input type="hidden" name="action" value="AddNewAddress">
                                        <button class="btn2" type="submit"  id="submitAddress" name="submitAddress">SAVE</button>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>

    <!-- Edit Adreess Modal -->
    <div class="modal fade edit-record-modal " id="editAddressModalCenter" tabindex="-1" role="dialog" aria-labelledby="editAddressModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <span class="cross-circle1 close ms-auto" data-dismiss="modal">
                        <a href="#" class="cross-icon"> 
                        <i class="fas fa-times-circle"></i></a>
                    </span>
                </div>
                <form class="editAddress" id="editAddress" action="{SITE_URL}create_order" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="text-center">
                            <h5 class="modal-title" >EDIT PICKUP ADDRESS</h5>
                            <div class="customer-details-content">
                                <div class="row">
                                     <div class="col col-12 col-md-6">
                                         <input type="text" name="name" id="editName" class="form-control" placeholder="Full Name*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="text" name="phone_no" id="editPhone_no" class="form-control" placeholder="Phone*">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                         <input type="text" name="flat_no" id="editFlat_no" class="form-control" placeholder="Flat No.& Building Name*">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                         <input type="text" name="locality" id="editLocality" class="form-control" placeholder="Road, Locality">
                                     </div>
                                     <div class="col col-12 col-md-12">
                                         <input type="text" name="landmark" id="editLandmark" class="form-control" placeholder="Landmark*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="text" name="pincode" id="editPincode" class="form-control" placeholder="Pincode*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="text" name="area" id="editArea" class="form-control" placeholder="Area*">
                                     </div>
                                     <div class="col col-12 col-md-6">
                                         <input type="checkbox" name="editDefault_address" id="default_address" placeholder="Area*" id="SaveDefault" style="margin-left: -30px;">
                                         <label for="SaveDefault">Save as default address</label>
                                     </div>
                                     <div class="col col-12 col-md-12">
                                        <input type="hidden" name="id" id="editAddress_id">
                                        <input type="hidden" name="action" value="editAddress">
                                        <button class="btn2" type="submit"  id="editAddress" name="editAddress">SAVE</button>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script type="text/javascript">
  $(document).on("click",".bulkUpload",function() {
    $("#file").trigger("click");
  });

  $(function () {
      $("#datepicker").datepicker({ 
            autoclose: true, 
            todayHighlight: true
      })
  });

  $(document).on("click",".order_summary_click",function() {
        
      $(".order_summary_section").removeClass("hide");

      var product_name     = $("#product_name").val();
      var product_price    = $("#product_price").val();
      var product_qty      = $("#product_qty").val();
      var customer_name    = $("#customer_name").val();
      var customer_phone   = $("#customer_phone").val();
      var customer_email   = $("#customer_email").val();
      var customer_address = $("#customer_address").val();
      var customer_pincode = $("#customer_pincode").val();
      var customer_city    = $("#customer_city").val();
      var customer_state   = $("#customer_state").val();
      var product_date     = $("#pickup_date").val();
      var ship_pack_weight = $("#ship_pack_weight").val();
      var pickup_address   = $("input[name='pickup_address']:checked").val();
      var courier_partner  = $('#courier_partner').val();
      var payment_method_val   = $("input[name='payment_method']:checked").val();
      
      var payment_method = payment_method_val == 'c' ? "COD" : "Prepaid";
        
      var full_address = customer_name+","+customer_phone+","+customer_address+","+customer_pincode+","+customer_city+","+customer_state;  

      $.ajax({
            type:"POST",
            dataType : 'json',
            url: window.location,
            data : {"action":"shippingRateCalculate",customer_pincode,pickup_address,ship_pack_weight,payment_method,courier_partner,product_price,product_qty},
            success: function(res)
            {
              $("#shippment_charge").val(res.shipingRatePrice);
              $("#cod_charges").val(res.codCharges);
              $("#total_price").val(res.totalPrice);
              $("#pickup_address_id").val(res.pickup_address_id);
              $("#summary_order_total").val("₹ "+(res.totalPrice)+" /");
            }
        });

      $("#summary_product_name").val(product_name);
      $("#summary_product_unit_price").val("₹ "+product_price+" /");
      $("#summary_product_qty").val(product_qty);
      $("#summary_address").val(full_address);
      $("#summary_date").val(product_date);
      $("#summary_payment_mode").val(payment_method);

  });

  $(document).on("submit",".bulkFile",function(){

      $(".bulkFile").validate({
        ignore: [],
        errorClass: 'help-block',
        errorElement: 'span',
        rules: {
          file:{required:true},
        },
        messages: {
          file:{required:"Please  enter  File."},
        },
        highlight: function (element) {
            $(element).closest('form-check-input').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('form-check-input').removeClass('has-error');
        },
        errorPlacement: function (error, element) {
          if(element.attr('id') == 'file'){
              error.insertAfter(element.closest('.form-check-input'));
          }else{
              error.insertAfter(element.closest('.form-check-input'));
          }
        }
      });
      if ($(".bulkFile").valid()) {
          return true;
      } else {
          return false;
      }
  });

  $(document).on("submit",".addAddress",function(){

      $(".addAddress").validate({
        ignore: [],
        errorClass: 'help-block',
        errorElement: 'span',
        rules: {
          name:{required:true},
          phone_no:{required:true,digits:true,minlength:10},
          landamark:{required:true},
          pincode:{required:true,digits:true,minlength:5,mixlength:6},
          area:{required:true},
        },
        messages: {
          name:{required:"Please Enter Name"},
          phone_no:{required:"Please enter Phone."},
          landamark:{required:"Please Enter Landmark."},
          pincode:{required:"Please Enter Pincode"},
          area:{required:"Please Enter Area"},
        },
        highlight: function (element) {
            $(element).closest('form-control').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('form-control').removeClass('has-error');
        },
        errorPlacement: function (error, element) {
          if(element.attr('id') == 'file'){
              error.insertAfter(element.closest('.form-control'));
          }else{
              error.insertAfter(element.closest('.form-control'));
          }
        }
      });
      if ($(".addAddress").valid()) {
          return true;
      } else {
          return false;
      }
  });

  $(document).on("click","#editAddress",function() {
      var id = $(this).data('id');

      $.ajax({
          type:"POST",
          dataType : 'json',
          url: window.location,
          data : {"action":"viewAddress",id},
          success: function(res)
          {
            $("#editName").val(res.name);
            $("#editPhone_no").val(res.phone_no);
            $("#editFlat_no").val(res.flat_no);
            $("#editLocality").val(res.locality);
            $("#editLandmark").val(res.landmark);
            $("#editPincode").val(res.pincode);
            $("#editArea").val(res.area);
            $("#editDefault_address").val(res.default_address);
            $("#editAddress_id").val(res.address_id); 
          }
      });
  });

  $(document).on("click","#deleteAddress",function() {
      var id = $(this).data('id');

      var del = confirm("Are you sure you want to delete?");
        if (del)
        $.ajax({
            type:"POST",
            dataType : 'json',
            url: window.location,
            data : {"action":"deleteAddress",id},
            success: function (response) 
            {
              if(response.status == 1)
              { 
                window.location = "{SITE_URL}create_order";   
              } 
              else 
              {
                toastr['error'](response.message);
              }
            },
        }); 
   });
</script>