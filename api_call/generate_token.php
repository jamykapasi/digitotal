<?php

// Get our helper functions
// require_once("inc/functions.php");

// Set variables for our request
$api_key = "076b1a79cdf5229219549b9e9a7cdbf8";
$shared_secret = "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";
$params = $_GET; // Retrieve all request parameters
$hmac = $_GET['hmac']; // Retrieve HMAC request parameter

$params = array_diff_key($params, array('hmac' => '')); // Remove hmac from params
ksort($params); // Sort params lexographically

$computed_hmac = hash_hmac('sha256', http_build_query($params), $shared_secret);

// Use hmac data to check that the response is from Shopify or not
if (hash_equals($hmac, $computed_hmac)) {

	// Set variables for our request
	
	$query = array(
		"client_id" => $api_key, // Your API key
		"client_secret" => $shared_secret, // Your app credentials (secret key)
		"code" => $params['code'] // Grab the access key from the URL
	);
	
	// Generate access token URL
	$access_token_url = "https://" . $params['shop'] . "/admin/oauth/access_token";
	
	// echo $access_token_url;
	// Configure curl client and execute request
	

	print_r($query);

	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $access_token_url .'?client_id='. $query['client_id'] .'&client_secret='. $query['client_secret'] .'&code='. $query['code'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',

));

$response = curl_exec($curl);

if($e = curl_error($curl))
{
	echo $e;
}

curl_close($curl);
echo $response;

	
	// Store the access token
	// $result = json_decode($result, true);
	// $access_token = $result['access_token'];
	
	// // Show the access token (don't do this in production!)
	
	// echo $access_token;
	
} else {
	// Someone is trying to be shady!
	die('This request is NOT from Shopify!');
}
?>

<!-- <script>


var requestOptions = {
  method: 'POST',
  redirect: 'follow'
};

fetch("https://bhejootest.myshopify.com/admin/oauth/access_token?client_id=076b1a79cdf5229219549b9e9a7cdbf8&client_secret=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&code=909853223aa475eb052af051662601d5 ", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));

</script> -->