 <form action="" method="post" name="frmCont" id="frmCont" class="form-horizontal" enctype="multipart/form-data" novalidate="novalidate">
    <div class="form-body">		
        <div class="form-group">
            <label for="first_name" class="control-label col-md-3">First Name:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="first_name" id="first_name" value="%FIRST_NAME%" />
            </div>
        </div>
         <div class="form-group">
            <label for="last_name" class="control-label col-md-3">Last Name:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="last_name" id="last_name" value="%LAST_NAME%" />
            </div>
        </div>

        <div class="form-group">
            <label for="last_name" class="control-label col-md-3">Email Address:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="email" id="email" value="%EMAIL_ADDRESS%" />
            </div>
        </div>
         <div class="form-group">
            <label for="last_name" class="control-label col-md-3">Password:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="password" id="password" value="%password%" />
            </div>
        </div>
         

        <div class="form-group">
            <label for="last_name" class="control-label col-md-3">Mobile Number:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="mobile_number" id="mobile_number" value="%mobile_number%" />
            </div>
        </div>
          <div class="form-group">
            <label for="last_name" class="control-label col-md-3">OTP:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="otp" id="otp" value="%otp%" />
            </div>
        </div>
         <div class="form-group">
            <label for="last_name" class="control-label col-md-3"> Verified OTP:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="verify_otp" id=" verify_otp" value="%otp2%" />
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
                    first_name:{required:true},
                    last_name:{required:true},
                    email:{required:true,email:true},
                    password:{required:true},
                    mobile_number:{required:true},
                    otp:{required:true},
                    verify_otp:{required:true},
                },
                messages: {
                    first_name:{required:"Please  enter  first name."},
                    last_name:{required:"Please  enter   last name."},
                    email:{required:"Please enter  email address."},
                    password:{required:"Please enter password."},
                    mobile_number:{required:"Please enter mobile number."},
                    otp:{required:"Please enter otp."},
                    verify_otp:{required:"Please verify otp."},
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
