<?php 
require('../../../config/config.php');
require('../../../config/core.php');
require('../../../core/router.php');
require('../../../core/class.php');
require('../../../core/facebook/autoload.php');

session_start();
$perintah = new CORE();

#=====================================

$fb = new Facebook\Facebook([
    'app_id' => '1426170637463993', // Replace {app-id} with your app id
    'app_secret' => 'e5891933eb5e4e0458c794cb3d587a06',
    'default_graph_version'=>'v2.8'
]);

$helper = $fb->getRedirectLoginHelper();

//1. ---------- ambil access token ----------
try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

//2. ---- access token udah diset atau belum ------
if (! isset($accessToken)) {
    if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
    }
    exit;
}

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId('291099761303485'); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
    // Exchanges a short-lived access token for a long-lived one
    try {
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
        exit;
    }
}

$_SESSION['fb_access_token'] = (string) $accessToken;

$response = $fb->get('/me?fields=id,name,email,picture,link,first_name,last_name', $_SESSION['fb_access_token']);

echo '<h3>Response Result</h3>';
$data = $response->getGraphUser();

/* BEGIN ADD DATA */

$email = $data['email'];
$fbid = $data['id'];
$firstname = $data['first_name'];
$lastname = $data['last_name'];
$name = $firstname.$lastname;
$foto = $data['picture'];


//simpan di database