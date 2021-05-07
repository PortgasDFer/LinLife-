<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Paypal\Auth\OAuthTokenCredential;
use Paypal\Rest\ApiContext;

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
    	)
	}

	public function payWithPayPal(Request $request)
	{
		
	}
   
}
