<?php
require '../src/Osms.php';

use \Osms\Osms;

//get token
$config = array(
    'clientId' => 'tAV28VlYxd5i5ZcLx3mPMzlHN7TWAWYL',
    'clientSecret' => 'PYFUGHDxITzb2n05'
);

$osms = new Osms($config);

//$osms->setVerifyPeerSSL(false);

$response = $osms->getTokenFromConsumerKey();

if (empty($response['error'])) {

    //afficher token
   // echo $response['access_token'];

    $config = array(
        'token' => $response['access_token']
    );
    
    $osms = new Osms($config);
    
    //$osms->setVerifyPeerSSL(false);
    //num receiver

    $response = $osms->sendSms(
        // sender
        'tel:+221776495190',
        // receiver
        'tel:+221777574580',
        // message
        'Hello World!',
    );
    
    if (empty($response['error'])) {
        echo 'Done!';
    } else {
        echo $response['error'];
    }
} 
else {
    echo $response['error'];
}


