 <form action="" method="post" name="frmCont" id="frmCSv" class="form-horizontal" enctype="multipart/form-data" novalidate="novalidate">

        <div class="form-group">
            <!-- label for="bulk_pincode" class="control-label col-md-3">Bulk Pincode</label> --> 
            <div class="col-md-4">
                <!-- <input type="file" class="form-control required" name="bulk_pincode" id="bulk_pincode" /> -->
            </div>
        </div>

        <div class="form-group">
            <label for="bulk_pincode" class="control-label col-md-3">Bulk Pincode</label> 
            <div class="col-md-4">
                <input type="file" class="form-control required" name="bulk_pincode" id="bulk_pincode" />
            </div>
        </div> 
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" name="uploadCSV" class="btn" id="uploadCSV">Submit</button>
            &nbsp;&nbsp;&nbsp;
            <button type="button" name="cn" class="btn btn-toggler" id="cn">Cancel</button>
        </div>
        
        <div class="flclear clearfix"></div>

        <input type="hidden" name="type" id="type" value="%TYPE%"><div class="flclear clearfix"></div>
        <input type="hidden" name="id" id="id" value="%ID%"><div class="padtop20"></div>
    </div>   
</form>
<script type="text/javascript">
    
     $(document).on('submit', '#frmCSv', function (e) {
            
            $("#frmCSv").validate({
                ignore: [],
                errorClass: 'help-block',
                errorElement: 'span',
                rules: {
                    bulk_pincode:{required:true},
                },
                messages: {
                    pincode:{required:"Please  Enter  File."},
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
            if ($("#frmCSv").valid()) {
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
