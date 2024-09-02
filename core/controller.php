<?php
require_once('controller.Class.php');
require_once('config.php');

if (isset($_GET["code"])) {
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET["code"]);
} else {
    header('location: ../pages/login.php');
    exit();
}

/* debugging userData
$oAuth = new Google\Service\Oauth2($gClient);
$userData = $oAuth->userinfo_v2_me->get();

echo "<pre>";
var_dump($userData);
echo "</pre>";
*/

if (isset($token["error"]) != "invalid_grant") {
    $oAuth = new Google\Service\Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();

    // insert data
    $Controller = new Controller;
    echo $Controller->insertData(array(
        'name' => $userData['name'],
        'email' => $userData['email'],
        'avatar' => $userData['picture'],
    ));
} else {
    header('location: ../pages/index.php');
    exit();
}
