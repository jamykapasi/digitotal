<script type="text/javascript">
    $(function () {

    ajaxSourceUrl = "<?php echo SITE_ADM_MOD.  $this->module; ?>/ajax.php";
       
    OTable = $('#dt_users').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": ajaxSourceUrl,
            "fnServerData": function (sSource, aoData, fnCallback) {
                $.ajax({
                    "dataType": 'json',
                    "type": "POST",
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback
                });
            },
            "aaSorting" : [],
            "aoColumns": [
                { sName: "id", sTitle : 'Email ID', 'bVisible': false},
               
                {"sName": "html_name", 'sTitle': 'Email Template Name'},
                {"sName": "subject_name", 'sTitle': 'Subject Name'},
              
                { "sName": "status", 'sTitle' : 'Status', bSortable:false, bSearchable:false},
                {"sName": "operation", 'sTitle': 'Action', bSortable: false, bSearchable: false}
                
            ],
            "fnServerParams"
                    : function (aoData) {
                        setTitle(aoData, this)
                    },
            "fnDrawCallback"
                    : function (oSettings) {
                        $('.make-switch').bootstrapSwitch();
                        $('.make-switch').bootstrapSwitch('setOnClass', 'success');
                        $('.make-switch').bootstrapSwitch('setOffClass', 'danger');

                    }

        });
        $('.dataTables_filter').css({float: 'right'});
        $('.dataTables_filter input').addClass("form-control input-inline");

        
        $(document).on('submit', '#frmCont', function (e) {
            $("#frmCont").on('submit', function () {
                for (var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].updateElement();
                }
            })
            $("#frmCont").validate({
                ignore: [],
                errorClass: 'help-block',
                errorElement: 'span',
                rules: {
                    html_name:{required:true},
                    subject_name:{required:true},
                    action:{required:true},
                    html_code:{required:true},

                    
                },
                messages: {
                    html_name:{required:"Please Enter Template Name."},
                    subject_name:{required:"Please Enter Subject Name."},
                    action:{required:"Please Enter action."},
                    html_code:{required:"Please Enter Email Continents"}
                    
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
    });
</script>
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet box blue-dark">
            <div class="portlet-title">
                <div class="caption site_setting_title">
                    <i class="fa fa-envelope"></i>Manage Email Template
                </div>
                 <div class="actions portlet-toggler btn_add_button">    
                 
                <a href="ajax.php?action=add" class="btn blue btn-add"><i class="fa fa-plus"></i> Add Email Template</a>       
                
                    <div class="btn-group"></div>
                </div>
            </div>
            <div class="portlet-body portlet-toggler">
                <table id="dt_users" class="table table-striped table-bordered table-hover"></table>
            </div>
            <div class="portlet-toggler pageform" style="display:none;"></div>
        </div>
    </div>
</div>

