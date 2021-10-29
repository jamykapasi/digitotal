
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="col content">
    <form action="{SITE_URL}create_order" method="post" enctype="multipart/form-data">
    <div class="head1">
         <h2 class="heading col-lg-7" style="letter-spacing: 2px; width: 38%;">CREATE NEW ORDERS</h2>
            <div class="create-order-file">
                <input type="file" name="file" id="file" >
                <button class="btn2 bulk col-lg-1 bulkUpload" id="btnFile" >BULK UPLOAD</button>
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

                <tr><td class="for-column"><a href="javascript:void(0);" class="order_summary_click btn2 btn-next">Order Summary</button></td></tr>

            </table>
        
        </div><br><br>

        <div class="form-style">
            <h4 class="part1">2.Select Pickup Address</h4>
            <h4 class="heading">PICKUP DETAILS</h4>
              <table class="data">

              <tr>
                  <td class="for-column"><select name="pickup_address_id" id="pickup_address_id" class="input" required>
                        <option value="">Select pickup address*</option>
                         #PICKUP_ADDRESS# 
                        </select>
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
                    <td class="for-column"><input type="text" name="courier_partner" id="courier_partner" class="input" placeholder="Courier Partner*" required/></td>
                    
                    <td class="for-column pickup-date">
                        <div id="datepicker" class="input-group input-group2 date pickup datepicker " data-date-format="dd-mm-yyyy">
                        <input class="form-control filter1 " type="text" name="pickup_date" id="pickup_date" value="Pickup Date*" />
                        <span class="input-group-addon calendar"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div>
                  </td>
             </tr>
          </table>
        </div><br><br>

     
        <div class="form-style order_summary_section hide">
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
                <tr><td><input type="hidden" name="total_price" id="total_price" value=""></td></tr>
                <tr><td><button type="submit" name="submitBtn" id="submitBtn" class="btn2 btn-next order-btn">PLACE ORDER</button></td></tr>
            </table>
            </form>  
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
      var pickup_address   = $('#pickup_address_id').val();
      var payment_method   = $("input[name='payment_method']:checked").val();
       
      var full_address = customer_name+","+customer_phone+","+customer_address+","+customer_pincode+","+customer_city+","+customer_state;  

      $.ajax({
            type:"POST",
            dataType : 'json',
            url: window.location,
            data : {"action":"shippingRateCalculate",customer_pincode,pickup_address,ship_pack_weight,payment_method,product_price,product_qty},
            success: function(res)
            {
              $("#shippment_charge").val(res.shipingRatePrice);
              $("#cod_charges").val(res.codCharges);
              $("#total_price").val(res.totalPrice);
              $("#summary_order_total").val("₹ "+(res.totalPrice)+" /");
            }
        });

      $("#summary_product_name").val(product_name);
      $("#summary_product_unit_price").val("₹ "+product_price+" /");
      $("#summary_product_qty").val(product_qty);
      $("#summary_address").val(full_address);
      $("#summary_date").val(product_date);

  });
</script>