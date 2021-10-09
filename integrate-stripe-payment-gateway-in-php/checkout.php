<?php
session_start();

require_once 'Database.php';
require_once "StripeHelper.php";
require_once "User.php";
/**
 * APP url/base url
 */
$appUrl = "http://localhost/projects/codingbirds_/integrate-stripe-payment-gateway-in-php/";

$productPrice = 100; // calculate as per logic //

$database = new Database();
/**
 * When registration form submitted
 */
if (isset($_POST['payNowBtn'])){
    $user = new User();
    $data = $_POST;
    $data['amount'] = $productPrice;
    $user = $user->registerUser($database->connection, $_POST);
    $_SESSION['user_id'] = $database->connection->insert_id;
}

$stripeHelper = new StripeHelper();
$stripe = $stripeHelper->stripeClient;
/**
 * Create product
 */
$product = $stripeHelper->createProducts();
/**
 * Create price for product
 */
$price = $stripeHelper->createProductPrice($product, $productPrice);
/**
 * create checkout session and payment link
 */
$stripeSession = $stripe->checkout->sessions->create(
    array(
        'success_url' => $appUrl . 'success.php?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => $appUrl . 'failed.php',
        'payment_method_types' => array('card'),
        'mode' => 'payment',
        'line_items' => array(
            array(
                'price' => $price->id,
                'quantity' => 1,
            )
        )
    )
);
header("Location: " . $stripeSession->url);
