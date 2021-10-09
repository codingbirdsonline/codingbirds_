<?php
require 'vendor/autoload.php';
include_once "constants.php";
class StripeHelper
{
    /**
     * @var \Stripe\StripeClient
     */
    public $stripeClient;

    public function __construct()
    {
        $this->stripeClient = new \Stripe\StripeClient(STRIPE_API_SECRET_KEY);
    }
    /**
     * Create product
     * @return \Stripe\Product
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function createProducts()
    {
        return $this->stripeClient->products->create(array(
            'name' => 'Course 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        ));
    }

    /**
     * Create price
     * @param $product
     * @param $productPrice
     * @return \Stripe\Price
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function createProductPrice($product, $productPrice)
    {
        return $this->stripeClient->prices->create(array(
            'unit_amount' => $productPrice * 100,
            'currency' => 'INR',
            'product' => $product->id,
        ));
    }
    /**
     * Get session detail
     * @param $sessionId
     * @return \Stripe\Checkout\Session
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function getSession($sessionId)
    {
        return $this->stripeClient->checkout->sessions->retrieve($sessionId);
    }
}
