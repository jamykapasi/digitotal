 <form action="" method="post" name="frmCont" id="frmCont" class="form-horizontal" enctype="multipart/form-data" novalidate="novalidate">
    <div class="form-body">		
        <div class="form-group">
            <label for="order_id" class="control-label col-md-3">Order Id:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="order_id" id="order_id" value="%ORDER_ID%" />
            </div>
        </div>
        <div class="form-group">
            <label for="product_name" class="control-label col-md-3">Product Details:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="product_name" id="product_name" value="%PRODUCT_DETAILS%" />
            </div>
        </div>
         <div class="form-group">
            <label for="product_qty" class="control-label col-md-3">Product QTY:</label> 
            <div class="col-md-4">
                <input type="number" class="form-control required" name="product_qty" id="product_qty" value="%PRODUCT_QTY%" />
            </div>
        </div>

        <div class="form-group">
            <label for="courier_name" class="control-label col-md-3">Shipment Details:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="courier_name" id="courier_name" value="%COURIER_NAME%" />
            </div>
        </div>
         <div class="form-group">
            <label for="enterd_weight" class="control-label col-md-3">Entered Weight:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="enterd_weight" id="enterd_weight" value="%ENTERD_WEIGHT%" />
            </div>
        </div>
         
        <div class="form-group">
            <label for="charged_weight" class="control-label col-md-3">Charged Weight:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="charged_weight" id="charged_weight" value="%CHARGED_WEIGHT%" />
            </div>
        </div>
          <div class="form-group">
            <label for="rest_of_india" class="control-label col-md-3">Discrepancy Proof:</label> 
            <div class="col-md-4">
                <input type="file" class="form-control required" name="proof" id="proof" value="%PROOF%" />
            </div>
        </div>
         
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" name="submitAddForm" class="btn" id="submitAddForm">Submit</button>
            &nbsp;&nbsp;&nbsp;
            <button type="button" name="cn" class="btn btn-toggler" id="cn">Cancel</button>
        </div>
        
        <div class="flclear clearfix"></div>

        <input type="hidden" name="type" id="type" value="%TYPE%"><div class="flclear clearfix"></div>
        <input type="hidden" name="id" id="id" value="%ID%"><div class="padtop20"></div>
    </div>   
</form>
<script type="text/javascript">
    
     $(document).on('submit', '#frmCont', function (e) {
            
            $("#frmCont").validate({
                ignore: [],
                errorClass: 'help-block',
                errorElement: 'span',
                rules: {
                    order_id:{required:true},
                    product_name:{required:true},
                    product_qty:{required:true,},
                    courier_name:{required:true},
                    enterd_weight:{required:true},
                    charged_weight:{required:true},
                    proff:{required:true},
                },
                messages: {
                    order_id:{required:"Please  enter  pincode."},
                    product_name:{required:"Please  enter product name."},
                    product_qty:{required:"Please enter product QTY."},
                    courier_name:{required:"Please enter shiping details."},
                    enterd_weight:{required:"Please enter enterd weight."},
                    charged_weight:{required:"Please enter charged weight."},
                    proff:{required:"Please enter discrepancy proof."},
                },
                highlight: function (element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorPlacement: function (error, element) {
                    if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            if ($("#frmCont").valid()) {
                return true;
            } else {
                return false;
            }
        });
   
        // $("#birthdate").datepicker({
        //     autoclose: true,
        //     format: "yyyy-mm-dd"
        // });
</script>
