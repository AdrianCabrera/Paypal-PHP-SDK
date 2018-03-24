<?php

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException ;


require '../app/init.php';

if(isset($_GET['approved'])){

	$approved = $_GET['approved'] === 'true';

	if ($approved) {
		
		$payerId= $_GET['PayerID'];



		// Get payment_id from database where hash = session hash
		//$_SESSION['paypal_hash'];

		// Get the PayPal payment
		$payment = Payment::get($_GET['paymentId'],$api);

		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);

		try{

			// Execute PayPal payment (charge)
			$payment->execute($execution, $api);

		}catch( PayPalConnectionException $e){

			// Log an error
			header('Location: ../paypal/error.php');

		}

		//Update transaction on database
		
		//Update user as member on database
		$_SESSION['member'] = 1;

		unset($_SESSION['paypal_hash']);

		header('Location: ../member/complete.php');
	}else{

		header('Location: ../member/cancelled.php');
	}

}