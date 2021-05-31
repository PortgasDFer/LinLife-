<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use App\Ventas;
use App\Dvp;
use Cart;

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

	public function payWithPayPal(Request $request,$folio)
	{
		
		$total=$request->input('monto');
		$venta=Ventas::where('folio','=',$folio)->firstOrFail();
		$venta->total=$total;
		$venta->save();


		
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$details = new Details();

		$amount = new Amount();
		$amount->setTotal($total);
		$amount->setCurrency('MXN');

		$transaction = new Transaction();
		$transaction->setAmount($amount);
		$transaction->setDescription('Pedido LinLife '.$venta->folio);
		//dd($transaction);

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
		$paymentId=$request->input('paymentId');
		$token=$request->input('token');
		$payerID=$request->input('PayerID');

		$status="No se pudo proceder con el pago através de PayPal";
		if(!$paymentId || !$payerID || !$token) {
			return redirect('/paypal/failed')->with(compact('status'));
		}

		$payment= Payment::get($paymentId,$this->apiContext);

		$execution=new PaymentExecution();
		$execution->setPayerId($payerID);

		$result=$payment->execute($execution,$this->apiContext);
		//dd($result);
		
		if($result->getState()==='approved'){
			$status =" Gracias! El pago a través de Paypal se ha realizado correctamente";
			return redirect('/paypal/ok')->with(compact('status'));
		}


	}

	public function payPalFail()
	{
		return view('UsrInterfaces.failed');
	}
   
   public function payPalOk()
   {
   		return view('UsrInterfaces.pago-exitoso');
   }


    public function insertarCarrito(Request $request,$folio)
    {
        $venta = new Ventas();
        $venta->folio=$folio;
        $venta->fecha=now()->format('Y-m-d');
        $venta->baja=1;
        $venta->id_user=auth()->id();
        $venta->total=$request->input('monto');
        /*
         * Estados de las ventas:
         * EN PROCESO = La venta se proceso, aún no tiene asignada comisión
         * FINALIZADA = La venta ha generado comisión al lider de ventas.
         * CANCELADA  = La venta no ha sido procesada, el usuario pudo salir de la página o simplemente decidio no comprar. 
         */
        //
        $venta->estado="EN PROCESO";
        $venta->tipo="VENTA";
        $venta->save();
        $arrayCarrito=Cart::getContent();
        $arrayCarrito->each(function($item) use ($folio)
        {
            $item->id; // the Id of the item
            $item->name; // the name
            $item->price; // the single price without conditions applied
            $item->quantity; // the quantity
            
            $dvp=new Dvp();
            $dvp->folio_venta=$folio;
            $dvp->code_producto=$item->id;
            $dvp->costo=$item->price;
            $dvp->cantidad=$item->quantity;
            $dvp->save();
        });

		
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$details = new Details();

		$amount = new Amount();
		$amount->setTotal($venta->total);
		$amount->setCurrency('MXN');

		$transaction = new Transaction();
		$transaction->setAmount($amount);
		$transaction->setDescription('Pedido LinLife '.$venta->folio);
		//dd($transaction);

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
}
