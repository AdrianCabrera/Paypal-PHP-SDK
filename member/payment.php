<?php

use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Exception\PayPalConnectionException ;

require_once '../app/init.php';


$payer = new Payer();
$details = new Details();
$amount = new Amount();
$transaction = new Transaction();
$payment  = new Payment();
$redirectUrls= new RedirectUrls();

//Payer
$payer->setPaymentMethod('paypal');

//Details
$details->setShipping('2.00')
	->setTax('0.00')
	->setSubtotal('2.00');

//Amount
$amount->setCurrency('EUR')
	->setTotal('4.00')
	->setDetails($details);

//Transaction
$transaction->setAmount($amount)
	->setDescription('Membership');

//Payment
$payment->setIntent('sale')
	->setPayer($payer)
	->setTransactions(array($transaction));

// Redirect Urls

$redirectUrls->setReturnUrl('http://localhost/paypal/pay.php?approved=true')
	->setCancelUrl('http://localhost/paypal/pay.php?approved=false');

$payment->setRedirectUrls($redirectUrls);


try{

	$payment->create($api);

	// Generate and store hash
	$hash = md5($payment->getId());
	$_SESSION['paypal_hash'] = $hash;

	// Prepare and execute transaction storage
	// Store user_id,payment_id and hash


}catch( PayPalConnectionException $e){
	// Log an error
	header('Location: ../paypal/error.php');
}


foreach($payment->getLinks() as $link){
	if ($link->getRel() == "approval_url") {
		$redirectUrl = $link->getHref();
	}
}

header("Location: ". $redirectUrl);