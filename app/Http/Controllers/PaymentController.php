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
use App\Ventas;

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

        $this->apiContext->setConfig($payPalConfig['settings']);
    }

	public function payWithPayPal(Request $request)
	{
		
		
		$venta=Ventas::where('folio','=',$request->input('folio'))->firstOrFail();


		$total=$request->input('monto');
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$amount = new Amount();
		$amount->setCurrency('MXN')->setTotal($total);

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
            //
            return redirect()->away($payment->getApprovalLink());
       } catch (PayPal\Exception\PayPalConnectionException $ex) {
		  echo $ex->getCode();
		  echo $ex->getData();
		  die($ex);
		} catch (Exception $ex) {
		  die($ex);
		}

	}

	public function payPalStatus(Request $request)
	{
		dd($request->all());
	}
   
}
