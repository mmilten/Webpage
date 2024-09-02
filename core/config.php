<?php
require_once('../google-api/vendor/autoload.php');

$gClient = new Google\Client();

//Required, call the setAutoConfig functon to load authorization credientials from
//client_secret.json file.
$gClient->setAuthConfig('../json/client.json');

// Required, to set the scope value, call the addScope function
$gClient->addScope('https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.login');

// Required, call the setRedirectUri function to specify a valid redirect URI for the
// provided client_id
$gClient->setRedirectUri('https://carefully-exotic-vervet.ngrok-free.app/webpage/core/controller.php');

// Recommended, offline access will give you both an access and refresh token so that
// your app can refresh the access token without user interaction.
$gClient->setAccessType('offline');

// Optional, if your application knows which user is trying to authenticate, it can use this
// parameter to provide a hint to the Google Authentication Server.
$gClient->setLoginHint('hint@example.com');

// Optional, call the setIncludeGrantedScopes function with true to enable incremental
// authorization
$gClient->setIncludeGrantedScopes(true);

$login_url = $gClient->createAuthUrl();
