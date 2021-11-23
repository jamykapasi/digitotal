 <form action="" method="post" name="frmCont" id="frmCont" class="form-horizontal" enctype="multipart/form-data" novalidate="novalidate">
    <div class="form-body">		
        <div class="form-group">
            <label for="wallet_balance" class="control-label col-md-3">Add Balance:</label> 
            <div class="col-md-4">
                <input type="text" class="form-control required" name="wallet_balance" id="wallet_balance" value="" />
            </div>
        </div> 
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" name="submitAddForm" class="btn" id="submitAddForm">Submit</button>
            &nbsp;&nbsp;&nbsp;
            <button type="button" name="cn" class="btn btn-toggler" id="cn">Cancel</button>
        </div>
        
        <div class="flclear clearfix"></div>
        <input type="hidden" name="action" id="action" value="addBalance"><div class="flclear clearfix"></div>
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
                    wallet_balance:{required:true,digits:true},
                },
                messages: {
                    wallet_balance:{required:"Please Enter Amount",digits:"Only Numbers Allowed"},
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
