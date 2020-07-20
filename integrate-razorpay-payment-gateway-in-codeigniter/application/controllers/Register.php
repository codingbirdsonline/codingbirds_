<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Register extends CI_Controller {
	/**
	 * This function loads the registration form
	 */
	public function index()
	{
		$this->load->view('register');
	}

	/**
	 * This function creates order and loads the payment methods
	 */
	public function pay()
	{
		$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		/**
		 * Always set the amount from backend for security reasons
		 */
		$_SESSION['payable_amount'] = 10;

		$razorpayOrder = $api->order->create(array(
			'receipt'         => rand(),
			'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
			'currency'        => 'INR',
			'payment_capture' => 1 // auto capture
		));


		$amount = $razorpayOrder['amount'];

		$razorpayOrderId = $razorpayOrder['id'];

		$_SESSION['razorpay_order_id'] = $razorpayOrderId;

		$data = $this->prepareData($amount,$razorpayOrderId);

		$this->load->view('automatic',array('data' => $data));
	}

	/**
	 * This function verifies the payment,after successful payment
	 */
	public function verify()
	{
		$success = true;
		$error = "payment_failed";
		if (empty($_POST['razorpay_payment_id']) === false) {
			$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		try {
				$attributes = array(
					'razorpay_order_id' => $_SESSION['razorpay_order_id'],
					'razorpay_payment_id' => $_POST['razorpay_payment_id'],
					'razorpay_signature' => $_POST['razorpay_signature']
				);
				$api->utility->verifyPaymentSignature($attributes);
			} catch(SignatureVerificationError $e) {
				$success = false;
				$error = 'Razorpay_Error : ' . $e->getMessage();
			}
		}
		if ($success === true) {
			/**
			 * Call this function from whereever you want
			 * to save save data before of after the payment
			 */
			$this->setRegistrationData();

			redirect(base_url().'register/success');
		}
		else {
			redirect(base_url().'register/paymentFailed');
		}
	}

	/**
	 * This function preprares payment parameters
	 * @param $amount
	 * @param $razorpayOrderId
	 * @return array
	 */
	public function prepareData($amount,$razorpayOrderId)
	{
		$data = array(
			"key" => RAZOR_KEY,
			"amount" => $amount,
			"name" => "Coding Birds Online",
			"description" => "Learn To Code",
			"image" => "https://demo.codingbirdsonline.com/website/img/coding-birds-online/coding-birds-online-favicon.png",
			"prefill" => array(
				"name"  => $this->input->post('name'),
				"email"  => $this->input->post('email'),
				"contact" => $this->input->post('contact'),
			),
			"notes"  => array(
				"address"  => "Hello World",
				"merchant_order_id" => rand(),
			),
			"theme"  => array(
				"color"  => "#F37254"
			),
			"order_id" => $razorpayOrderId,
		);
		return $data;
	}

	/**
	 * This function saves your form data to session,
	 * After successfull payment you can save it to database
	 */
	public function setRegistrationData()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$amount = $_SESSION['payable_amount'];

		$registrationData = array(
			'order_id' => $_SESSION['razorpay_order_id'],
			'name' => $name,
			'email' => $email,
			'contact' => $contact,
			'amount' => $amount,
		);
		// save this to database

	}

	/**
	 * This is a function called when payment successfull,
	 * and shows the success message
	 */
	public function success()
	{
		$this->load->view('success');
	}
	/**
	 * This is a function called when payment failed,
	 * and shows the error message
	 */
	public function paymentFailed()
	{
		$this->load->view('error');
	}
	
	
}
