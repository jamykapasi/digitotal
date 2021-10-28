 <form action="" method="post" name="frmCont" id="frmCont" class="form-horizontal" enctype="multipart/form-data" novalidate="novalidate">
    <div class="form-body">		
        <div class="form-group">
            <label for="pincode" class="control-label col-md-3">Pincode:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="pincode" id="pincode" value="%PINCODE%" />
            </div>
        </div>
        <div class="form-group">
            <label for="courier_logo" class="control-label col-md-3">Courier Partner Logo:</label> 
            <div class="col-md-4">
                <input type="file" class="form-control required" name="courier_logo" id="courier_logo" value="%COURIER_PARTNER%" />
            </div>
        </div>
         <div class="form-group">
            <label for="courier_partner" class="control-label col-md-3">Courier Partner:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="courier_partner" id="courier_partner" value="%COURIER_PARTNER%" />
            </div>
        </div>

        <div class="form-group">
            <label for="within_city" class="control-label col-md-3">Within City:</label> 
            <div class="col-md-4">
                <input type="number" class="form-control required" name="within_city" id="within_city" value="%WITHIN_CITY%" />
            </div>
        </div>
         <div class="form-group">
            <label for="within_zone" class="control-label col-md-3">Within Zone:</label> 
            <div class="col-md-4">
                <input type="number" class="form-control required" name="within_zone" id="within_zone" value="%WITHIN_ZONE%" />
            </div>
        </div>
         

        <div class="form-group">
            <label for="metros" class="control-label col-md-3">Metros:</label> 
            <div class="col-md-4">
                <input type="number" class="form-control required" name="metros" id="metros" value="%METROS%" />
            </div>
        </div>
          <div class="form-group">
            <label for="rest_of_india" class="control-label col-md-3">Rest Of India:</label> 
            <div class="col-md-4">
                <input type="number" class="form-control required" name="rest_of_india" id="rest_of_india" value="%REST_OF_INDIA%" />
            </div>
        </div>
         <div class="form-group">
            <label for="special_zone" class="control-label col-md-3">Special Zone:</label> 
            <div class="col-md-4">
                <input type="number" class="form-control required" name="special_zone" id=" special_zone" value="%SPECIAL_ZONE%" />
            </div>
        </div>
        <div class="form-group">
            <label for="cod" class="control-label col-md-3">COD:</label> 
            <div class="col-md-4">
                <input type="number" class="form-control required" name="cod" id=" cod" value="%COD%" />
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
                    pincode:{required:true},
                    courier_partner:{required:true},
                    within_city:{required:true,},
                    within_zone:{required:true},
                    metros:{required:true},
                    rest_of_india:{required:true},
                    special_zone:{required:true},
                    cod:{required:true},
                },
                messages: {
                    pincode:{required:"Please  enter  pincode."},
                    courier_partner:{required:"Please  enter courier partner name."},
                    within_city:{required:"Please enter within city."},
                    within_zone:{required:"Please enter within zone."},
                    metros:{required:"Please enter metros."},
                    rest_of_india:{required:"Please enter rest of india."},
                    special_zone:{required:"Please verify special zone."},
                    cod:{required:"Please verify cod."},
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
