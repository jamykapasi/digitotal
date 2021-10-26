<!DOCTYPE html>
<html lang="en">
	<head>
		%HEAD%
	</head>
	<?php 
	
	if($_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'login'  OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'login/' OR
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'register' OR
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'register/' OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'forgot_password' OR
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'forgot_password/' 
		)
	{
		$body_class = "lonin-register-content";
	} 
	else if($_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'dashboard'  OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'dashboard/') 
	{
		$body_class = "channel-integration";

	}

	else if($_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'create_order'  OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'create_order/') 
	{
		$body_class = "channel-integration style2";

	}

	else if($_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'manage_order'  OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'manage_order/') 
	{
		$body_class = "channel-integration style2";

	}

	else if($_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'weight_discrepancy'  OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'weight_discrepancy/') 
	{
		$body_class = "channel-integration style2";

	}

	else if($_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'courier_partner_priority'  OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'courier_partner_priority/') 
	{
		$body_class = "channel-integration style2";

	}

	else if($_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'shipping_rate'  OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'shipping_rate/') 
	{
		$body_class = "overflow-page notification-content shipping-rates";

	}

	else if($_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'shipping_rate_calculator'  OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'shipping_rate_calculator/') 
	{
		$body_class = "notification-content shipping-rates";

	}

	else if($_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'credits_summary'  OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'credits_summary/') 
	{
		$body_class = "channel-integration style2";

	}

	else if($_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'report'  OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'report/') 
	{
		$body_class = "channel-integration style2";

	}

	else if($_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'notification'  OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'notification/') 
	{
		$body_class = "channel-integration style2";

	}

	else if($_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'rate_calculator'  OR 
		$_SERVER['REQUEST_URI']== PROJECT_DIRECTORY_NAME_HEADER.'rate_calculator/') 
	{
		$body_class = "channel-integration style2";

	}

	?>		
	
	<body class="<?php echo $body_class;?>">
		%SITE_HEADER%
		
			%LOAD_CSS%
			%BODY%
		
			%FOOTER%
	</body>
		%LOAD_JS_VARIABLE%
		%LOAD_JS%
		<script type="text/javascript" src="{SITE_JS}toastr/toastr.min.js"></script>
		<script type="text/javascript">
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"preventDuplicates":false,
			"positionClass": "toast-top-right",
			"onclick": null,
			"showDuration": "5000",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
		</script>
		%MESSAGE_TYPE%
	</body>
</html>