<script type="text/javascript">
    $(function () {
        $(document).on('submit', '#frmCP', function (e) {
            $("#frmCP").on('submit', function () {
                for (var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].updateElement();
                }
            })
            $("#frmCP").validate({
                ignore: [],
                errorClass: 'help-block',
                errorElement: 'span',
                rules: {
                    opasswd: {
                        required: true
                    },
                    passwd: {
                        required: true,
                        minlength: 6,
                        maxlength: 12,
                    },
                    cpasswd: {
                        required: true,
                        minlength: 6,
                        maxlength: 12,
                        equalTo: "#passwd"
                    }
                },
                messages: {
                    opasswd: {
                        required: "&nbsp;Please enter current password"
                    },
                    passwd: {
                        required: "&nbsp;Please enter new password",
                        minlength: "&nbsp;At least 6 characters.",
                        maxlength: "&nbsp;At least 12 characters.",
                    },
                    cpasswd: {
                        required: "&nbsp;Please confirm new password",
                        minlength: "&nbsp;At least 6 characters.",
                        maxlength: "&nbsp;At least 12 characters.",
                        equalTo: "&nbsp;Password do not match."
                    }

                },
                errorPlacement: function (error, element) {
                    if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            if ($("#frmCP").valid()) {
                return true;
            } else {
                return false;
            }
        });
    });
</script>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-dark">
            <div class="portlet-title">
                <div class="caption site_setting_title">
                    <i class="fa fa-key"></i>Change Password
                </div>
            </div>
            <div class="portlet-body form">
                <form action="" method="post" name="frmCP" id="frmCP" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-body"><div class="flclear clearfix"></div>
                        <input type="hidden" name="passvalue" id="passvalue" value="">
                        <div class="form-group">
                            <label for="opasswd" class="control-label col-md-3"><font color="#FF0000"></font>Current Password: &nbsp;</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control logintextbox-bg required" name="opasswd" id="opasswd" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="passwd" class="control-label col-md-3"><font color="#FF0000"></font>New Password: &nbsp;</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control logintextbox-bg required" name="passwd" id="passwd" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cpasswd" class="control-label col-md-3"><font color="#FF0000"></font>Confirm New Password: &nbsp;</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control logintextbox-bg required" name="cpasswd" id="cpasswd" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cpasswd" class="control-label col-md-3"></label>
                            <div class="col-md-4">
                                <button type="submit" name="submitChange" class="btn green" id="submitChange">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
