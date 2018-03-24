<?php

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

session_start();

if (!isset($_SESSION['member']) || $_SESSION['member'] == 0) {
	$_SESSION['member'] = 0;
}



require dirname(__FILE__)."/../vendor/autoload.php";


// API

$api = new ApiContext(
	new OAuthTokenCredential(
		'YOUR_CLIENT_ID',
		'YOUR_SECRET'
		)
	);

$api->setConfig(
	array(
		'mode'=>'sandbox',
		'http.ConnectionTimeOut'=>30,
		'log.logEnabled' => false,
		'log.FileName' => '',
		'log.LogLevel' => 'FINE',
		'validation.level' => 'log'
		)
	);