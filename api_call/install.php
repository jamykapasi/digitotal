<?php

// Set variables for our request
$shop = $_POST;

// print_r($shop);

$api_key = "076b1a79cdf5229219549b9e9a7cdbf8";
$scopes = "read_orders,write_products";
$redirect_uri = "https://staging.bhejooo.com/app/api_call/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop['storeName'] . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();
