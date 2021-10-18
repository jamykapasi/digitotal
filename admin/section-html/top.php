<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>%HEAD%</head>
    <body class="%LG_CLASS%">
        %SITE_HEADER%
        %F_COND%
        %LEFT%
        <div class="page-content-wrapper">
            %S_COND%
            %BODY%
            %T_COND%
        </div>
        %FT_COND%
        %FOOTER%
       
        <script src="{SITE_ADMIN_JS}jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="{SITE_ADMIN_JS}jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
        <script src="{SITE_ADMIN_JS}bootstrap.min.js" type="text/javascript"></script>
        <script src="{SITE_ADMIN_JS}bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="{SITE_ADMIN_JS}jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{SITE_ADMIN_JS}jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{SITE_ADMIN_JS}jquery.cokie.min.js" type="text/javascript"></script>
        <script src="{SITE_ADMIN_JS}jquery.uniform.min.js" type="text/javascript"></script>
        <script src="{SITE_ADMIN_JS}jquery.validate.min.js" type="text/javascript"></script>

        <script src="{SITE_ADMIN_JS}bootstrap-datepicker.js" type="text/javascript"></script>

        <script type="text/javascript" src="{SITE_ADMIN_JS}additional-methods.min.js"></script>
       
        <script type="text/javascript" src="{SITE_ADMIN_JS}ckeditor/ckeditor.js"></script>
        
        <script type="text/javascript" src="{SITE_ADMIN_JS}toastr.min.js"></script>

        <!-- home js -->
        %HOME_JS%
        <!-- home js -->

        <script type="text/javascript">
            toastr.options = {"closeButton": true,"debug": false,"positionClass": "toast-top-right"
            ,
"preventDuplicates": true,
"preventOpenDuplicates": true,"onclick": null,"showDuration": "3000","hideDuration": "10000","timeOut": "5000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"}
        </script>
        
        <script src="{SITE_ADMIN_JS}app.js" type="text/javascript"></script>
        <script src="{SITE_ADMIN_JS}components-pickers.js" type="text/javascript"></script>
        <script src="{SITE_ADMIN_JS}admin.js" type="text/javascript"></script>

        <script type="text/javascript">
            jQuery(document).ready(function () {
                %TOASTR_MSG%
                App.init();
                ComponentsPickers.init();
            });
            
            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                if (confirm("Are you sure to delete record?")) {
                    var $this = $(this);
                    var $type = $(this).attr('data-type');
                    var editLink = $this.attr('href');
                    $.ajax({
                        url: editLink,
                        type: "POST",
                        dataType: "json",
                        success: function (response) {
                            if ('' != response.type && '' != response.message) {
                                toastr[response.type](response.message);
                                if ('success' == response.type) {
                                    OTable.fnDraw();
                                    if($type == 'remove_dependency'){
                                        $this.closest('.dottedBorder').find('.dep_div').remove();
                                        $this.remove();
                                    }
                                }
                            } else {
                                toastr['error']('There seems to be an issue. Please try again after some time.');
                            }
                        }
                    });
                }
            });

            $(document).on('click', '.btn-accept', function (e) {
                e.preventDefault();
                if (confirm("Are you sure to block this user ?")) {
                    var $this = $(this);
                    var $type = $(this).attr('data-type');
                    var editLink = $this.attr('href');
                    $.ajax({
                        url: editLink,
                        type: "POST",
                        dataType: "json",
                        success: function (response) {
                            if ('' != response.type && '' != response.message) {
                                toastr[response.type](response.message);
                                if ('success' == response.type) {
                                    OTable.fnDraw();
                                    if($type == 'remove_dependency'){
                                        $this.closest('.dottedBorder').find('.dep_div').remove();
                                        $this.remove();
                                    }
                                }
                            } else {
                                toastr['error']('There seems to be an issue. Please try again after some time.');
                            }
                        }
                    });
                }
            });

            $(document).on('click', '.btn-reject', function (e) {
                e.preventDefault();
                if (confirm("Are you sure want to unblock this user ?")) {
                    var $this = $(this);
                    var $type = $(this).attr('data-type');
                    var editLink = $this.attr('href');
                    $.ajax({
                        url: editLink,
                        type: "POST",
                        dataType: "json",
                        success: function (response) {
                            if ('' != response.type && '' != response.message) {
                                toastr[response.type](response.message);
                                if ('success' == response.type) {
                                    OTable.fnDraw();
                                    if($type == 'remove_dependency'){
                                        $this.closest('.dottedBorder').find('.dep_div').remove();
                                        $this.remove();
                                    }
                                }
                            } else {
                                toastr['error']('There seems to be an issue. Please try again after some time.');
                            }
                        }
                    });
                }
            });

            $(document).on('click', '.btn-send', function (e) {
                e.preventDefault();
                if (confirm("Are you sure to send newsletter?")) {
                    var $this = $(this);
                    var editLink = $this.attr('href');
                    $.get(editLink, function (r) {
                        OTable.fnDraw();
                        toastr['success']('newssendsuccess');
                    });
                }
            });
            $(document).on('click', '.send', function (e) {
                e.preventDefault();
                if (confirm("Are you sure to send password to this dealer?")) {
                    var $this = $(this);
                    var editLink = $this.attr('href');
                    $.get(editLink, function (r) {
                        OTable.fnDraw();
                        toastr['success']('Password sent successfully.');
                    });
                }
            });
            $(document).on('click', '.btn-viewbtn', function (e) {
                e.preventDefault();
                var $this = $(this);
                var viewLink = $this.attr('href');
                var PageTitle = $this.attr('data-page_title');
                PageTitle = (PageTitle != null) ? PageTitle : 'View details';
                $(".modal-title").html(PageTitle);
                $(".modal-body").html('<div class="popup-loader"><img src="{SITE_ADM_IMG}ajax-loading.gif" align="middle" /></div>');
                $("#myModal_autocomplete").modal();
                $.get(viewLink, function (r) {
                    $(".modal-body").html(r);
                });
            });

            function addOverlay() { $('<div id="overlayDocument"><img src="{SITE_ADM_IMG}ajax-modal-loading.gif" /></div>').appendTo(document.body); }
            function removeOverlay() { $('#overlayDocument').remove(); }
            function loadCKE(id) {
                var instance = CKEDITOR.instances[id];
                if (instance) {
                    CKEDITOR.remove(instance);
                }
                CKEDITOR.replace(id,{
                    filebrowserUploadUrl: '{SITE_URL}include/upload.php'
                });
            }
            $(document).ready(function () {
                $(".date-picker").datepicker({
                    autoclose: true,
                    format: "yyyy-mm-dd"
                });

                $(document).on('keydown', '.checkFloat', function (e) {
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                        (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
                        (e.keyCode >= 35 && e.keyCode <= 40)) {
                             return;
                    }
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });

                $(document).on('keydown', '.checkNumber', function (e) {
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
                        (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
                        (e.keyCode >= 35 && e.keyCode <= 40)) {
                             return;
                    }
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });

            });

            function ajaxFormSubmit(form_element, toggle_portlet_toggler = true) {
                $(form_element).ajaxForm({
                    beforeSend: function () {
                        addOverlay();
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                    },
                    success: function (html, statusText, xhr, $form) {
                        obj = $.parseJSON(html);
                        if (obj.status) {
                            toastr["success"](obj.success);
                            if(toggle_portlet_toggler) {
                                $('.portlet-toggler').toggle();
                                OTable.fnDraw();
                            }
                            return false;
                        } else {
                            toastr["error"](obj.error);
                            return false;
                        }
                        return false;
                    },
                    complete: function (xhr) {
                        removeOverlay();
                        return false;
                    }
                }).submit();
            }
            function initilizeRaty(control_name, score) {
                
            }
        </script>
        %LOAD_JS%
    </body>
</html>