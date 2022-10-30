<?php
require '../src/Osms.php';

use \Osms\Osms;
$config = array(
    'clientId' => 'tAV28VlYxd5i5ZcLx3mPMzlHN7TWAWYL',
    'clientSecret' => 'PYFUGHDxITzb2n05'
);

$osms = new Osms($config);

//$osms->setVerifyPeerSSL(false);

$response = $osms->getTokenFromConsumerKey();

if (empty($response['error'])) {
    
    // echo $osms->getToken();
    // echo '<pre>'; print_r($response); echo '</pre>';
    $config = array(
        'token' => $response['access_token']
    );
    
    $osms = new Osms($config);
    
    //$osms->setVerifyPeerSSL(false);
    
    $response = $osms->getAdminStats(array('country' => 'SEN'));
    // $response = $osms->getAdminStats();
    // $response = $osms->getAdminStats(array('appid' => 'your_app_id'));
    // $response = $osms->getAdminStats(array('country' => 'CIV', 'appid' => 'your_app_id'));
    
    if (empty($response['error'])) {
        echo json_encode($response) ;
        //echo '<pre>'; print_r($response); echo '</pre>';
    } else {
        echo $response['error'];
    }

} else {
    echo $response['error'];
}

