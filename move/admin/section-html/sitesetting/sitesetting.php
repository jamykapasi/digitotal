<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-dark">
             <div class="portlet-title">
                <div class="caption site_setting_title">
                    <i class="fa fa-cogs"></i>Site Setting
                </div>
            </div>

            <div class="portlet-body form">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" name="frmSS" id="frmSS" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-body">
                        
                        %SETTING_FILED%

                        <div class="form-group">
                            <label for="1" class="control-label col-md-3"></label>
                            <div class="col-md-4">
                                <button type="submit" name="submitAddForm" class="btn green" id="submitAddForm">Submit</button>
                            </div>
                        </div>

                    </div>	
                </form> 
            </div>
        </div>   
    </div>
</div>    	