<?php
session_start();
require 'vendor/autoload.php';
include_once "../env-constants.php";

$stripe = new \Stripe\StripeClient(STRIPE_API_SECRET_KEY);
/**
 * When registration form submitted
 */

$unitPrice = $_GET['price'];
$currency = $_GET['currency'];
$price = $stripe->prices->create(
    array('currency' => $currency, 'unit_amount' => $unitPrice * 100, 'product' => STRIPE_DEMO_PRODUCT)
);
$paymentLink = $stripe->paymentLinks->create(
    array('line_items' => array(
        array('price' => $price->id, 'quantity' => 1)
    ))
);
header("Location: " . $paymentLink->url);


