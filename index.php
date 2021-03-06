<?php
require_once 'app/init.php';

if(isset($_REQUEST["logout"])){
	$_SESSION['member'] = 0;
	header('Location: '.$_SERVER["PHP_SELF"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Paypal PHP SDK</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
	<style>
	.card-img-custom{
		object-fit: cover;
		max-height:100px;
	}
	</style>
</head>
<body>
	<nav class="navbar bg-secondary text-white">
		<h1>Paypal PHP SDK</h1>
	</nav>
	<div class="d-md-flex flex-row justify-content-around align-items-stretch align-content-stretch">
		<?php if (isset($_SESSION['member']) && $_SESSION['member'] != 1): ?>
		<div class="card text-center mt-5">
			<img class="card-img-top card-img-custom" src="http://placehold.it/500x100/" alt="">
			<div class="card-body">
				<h4 class="card-title">Via Anchor tag</h4>
				<p class="card-text">You are not a member <a href="member/payment.php" title="">Become a member</a></p>
			</div>
		</div>

		<div class="card text-center mt-5">
			<img class="card-img-top card-img-custom" src="http://placehold.it/500x100/" alt="">
			<div class="card-body">
				<h4 class="card-title">Via data attribute</h4>
				<p class="card-text">
					<a href="member/payment.php" data-paypal-button="true">
						<img src="//www.paypalobjects.com/en_US/i/btn/btn_xpressCheckout.gif" alt="Check out with PayPal" />
					</a>
				</p>
			</div>
		</div>
		<div class="card text-center mt-5">
			<img class="card-img-top card-img-custom" src="http://placehold.it/500x100/" alt="">
			<div class="card-body">
				<h4 class="card-title">Via Javascript</h4>
				<p class="card-text">
					<script async="async" src="https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=BUSINESS_ACCOUNT_EMAIL_ID" 
					data-button="buynow" 
					data-name="Membership" 
					data-amount="1.00" 
					data-currency="EUR" 
					data-shipping="0.00" 
					data-tax="0.00" 
					data-callback="http://localhost/paypal/pay.php?approved=true&callback=true" 
					data-return="http://localhost/paypal/pay.php?approved=true&express=true"
					data-env="sandbox"
					></script>
				</p>
			</div>
		</div>						
		<?php else: ?>
		<div class="card text-white bg-info mt-5">
		  <div class="card-body">
			<h4 class="card-title">You are a member</h4>
			<p class="card-text text-center mt-5">
				<a href="http://localhost?logout=true" class="text-white"><span class="oi oi-account-logout" title="account-logout" aria-hidden="true"></span><br/>Log out</a>
			</p>
		  </div>
		</div>
		<?php endif; ?>
	</div>
</body>
<script src="https://www.paypalobjects.com/js/external/paypal-button.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>