<!DOCTYPE html>
<html lang="en">
	<head>
		%HEAD%
	</head>
	<body class="site-content">
		%SITE_HEADER%
		<main>
			%LOAD_CSS%
			%BODY%
		<main>	
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