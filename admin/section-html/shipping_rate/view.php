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
            {"sName": "id", 'sTitle' : 'ID', 'bVisible': false},
            {"sName": "", 'sTitle': 'ID'},
            {"sName": "", 'sTitle': 'Courier Logo'},
            {"sName": "", 'sTitle': 'Courier Partner'},

            {"sName": "status", 'sTitle' : 'Status', bSortable:false, bSearchable:false},
            // {"sName": "name", 'sTitle' : 'Created'}, 
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

        
    });
</script>

<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet box blue-dark">
            <div class="portlet-title">
                <div class="caption site_setting_title">
                    <i class="fa fa-users"></i>Manage Shipping Rate
                </div>
                 <div class="actions portlet-toggler btn_add_button">
                    <a href="ajax.php?action=add" class="btn blue btn-add"><i class="fa fa-plus"></i> Add Shipping Rate</a>      
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
<script type="text/javascript">
    $(document).on("click","#removePin",function() {
      var id = $(this).data('id');

      var del = confirm("Are you sure you want to delete?");
        if (del)
        $.ajax({
            type:"POST",
            dataType : 'json',
            url: window.location,
            data : {"action":"deletePincode",id},
            success: function (res) 
            {       
                if(res.status == 1)
                { 
                  window.location.reload();
                } 
                else 
                {
                    toastr['error'](response.message);
                }
            },
        }); 
    });
</script>
