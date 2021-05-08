<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

class PaymentController extends Controller
{
   
	private $apiContext;

	public function __construct()
	{
	$payPalConfig = Config::get('paypal');

    $this->apiContext = new ApiContext(
    	new OAuthTokenCredential(
    			$payPalConfig['client_id'],
    			$payPalConfig['secret']
    		)
    	);
	}

	public function payWithPayPal(Request $request,$folio)
	{
		
		$total=$request->input('monto');
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$amount = new Amount();
		$amount->setTotal($total);
		$amount->setCurrency('MXN');

		$transaction = new Transaction();
		$transaction->setAmount($amount);
		//$transaction->setDescription('Pedido LinLife '.$folio);

		$urlCallback = url('/paypal/status');
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl($urlCallback)
		    ->setCancelUrl($urlCallback);

		$payment = new Payment();
		$payment->setIntent('sale')
		    ->setPayer($payer)
		    ->setTransactions(array($transaction))
		    ->setRedirectUrls($redirectUrls);
		    //dd($payment);
		try {
		    $payment->create($this->apiContext);
		    echo $payment;

		    return redirect()->away($payment->getApprovalLink());
		}
		catch (PayPalConnectionException $ex) {
		    //REALLY HELPFUL FOR DEBUGGING
		    echo $ex->getData(); 
		}

	}

	public function payPalStatus(Request $request)
	{
		dd($request->all());
	}
   
}
