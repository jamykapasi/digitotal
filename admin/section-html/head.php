<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta content="width=device-width, initial-scale=1" name="viewport"/>

<title>Admin Panel</title>


<link href="<?php echo SITE_ADM_CSS; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_ADM_CSS; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_ADM_CSS; ?>uniform.default.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo SITE_ADM_CSS; ?>style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_ADM_CSS; ?>style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_ADM_CSS; ?>style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_ADM_CSS; ?>plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_ADM_CSS; ?>tasks.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_ADM_CSS; ?>brown.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo SITE_ADM_CSS; ?>print.css" rel="stylesheet" type="text/css" media="print"/>
<link href="<?php echo SITE_ADM_CSS; ?>custom.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_ADM_CSS; ?>toastr.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_ADM_CSS; ?>datepicker.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_ADM_CSS; ?>datepicker.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_ADM_CSS; ?>select2.min.css" rel="stylesheet" type="text/css"/>


<link href="<?php echo SITE_ADM_CSS; ?>data-table/DT_bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_ADM_CSS; ?>bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>


<?php echo load_css($this->styles); ?>
<script src="<?php echo SITE_ADMIN_JS; ?>jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_ADMIN_JS; ?>bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_ADMIN_JS; ?>select2.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_ADMIN_JS; ?>jquery.numeric.js" type="text/javascript" charset="utf-8"></script>

<script src="<?php echo SITE_ADMIN_JS; ?>data-table/datatable.js" type="text/javascript" charset="utf-8"></script>

<script src="<?php echo SITE_ADMIN_JS; ?>data-table/jquery.dataTables.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo SITE_ADMIN_JS; ?>data-table/DT_bootstrap.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo SITE_ADMIN_JS; ?>bootstrap-switch.min.js" type="text/javascript" charset="utf-8"></script>


<script language="javascript" type="text/javascript">
    var SITE_URL = '<?php echo SITE_URL; ?>';
    
    $(function () {
        var mBar = $('.page-sidebar-menu').find('li.sm-<?php echo $this->module; ?>');
        mBar.addClass('active');
        mBar.parents('ul.sub-menu').parent('li').addClass('active');
    });

</script>

