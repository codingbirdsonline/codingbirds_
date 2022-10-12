<?php
session_start();
require 'vendor/autoload.php';
include_once "../env-constants.php";

$stripe = new \Stripe\StripeClient("sk_test_51JeCjYSBf1mHwO1zZ2b3MvAnKrtumvh3IqMltmQhnvIZxCYGk00tvILhYzlgZEIix5rXMmPROivzhgW6D2apkkKW00tSDdoH1U");
/**
 * When registration form submitted
 */

    $unitPrice = $_POST['price'];
    $price = $stripe->prices->create(
        array('currency' => $_POST['currency'], 'unit_amount' => $unitPrice * 100, 'product' => 'prod_MaSkTnl7xEMcMJ')
    );
    $paymentLink = $stripe->paymentLinks->create(
        array('line_items' => array(
            array('price' => $price->id, 'quantity' => 1)
        ))
    );
   echo json_encode(
       array(
           'link' => $paymentLink->url,
           'price' => $unitPrice
       )
   );



