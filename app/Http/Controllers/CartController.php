<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Alert;
use Redirect,Response;
use Cart;
use App\Producto;
use App\Ventas;
use App\Domicilio;
use App\Dvp;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $producto = Producto::find($request->code_producto);

        Cart::add(
            $producto->code,
            $producto->nombre,
            $producto->precio_publico,
            1,
            array("imagen"=>$producto->imagen)
        );
        alert()->success('LIN LIFE', 'Se agrego al carrito correctamente');
        return back();
    }
    
    public function agregar(Request $request)
    {
        $producto = Producto::find($request->code_producto);
         Cart::add(
            $producto->code,
            $producto->nombre,
            $producto->precio_publico,
            $request->quantity,
            array("imagen"=>$producto->imagen)
        );
        alert()->success('LIN LIFE', 'Se agrego al carrito correctamente');
        return back();

        //dd($request);
    }

    public function cart(){
        $domicilio=Domicilio::where('id_user','=',auth()->id())->get();
        return view('ShpInterfaces.carrito', compact('domicilio'));
    }

    public function removeitem(Request $request)
    {
        Cart::remove([
            'code' => $request->code,
        ]);

        alert()->success('LIN LIFE', 'Producto removido');
        return back();
    }

    public function clear(){
        Cart::clear();
        alert()->success('LIN LIFE', 'Carrito vacio');
        return back();
    }

    public function actualizar(Request $request)
    {    
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));

        alert()->success('LIN LIFE', 'Cantidad Actualizada');
        return back();
    }

    public function procesopedido(Request $request){
        if (Cart::getContent()->count()>0) {
            # code...
        }else{

        }
    }

    public function revisar(){
        $foliobase=Ventas::select('folio')->orderby('folio','DESC')->first();
        $folionuevo=substr($foliobase,10,-8);
        $numero=substr($foliobase, 14,-2);
        $contador=$numero+1;
        $nuevofolio=$folionuevo.$contador;
        $fechaactual=now()->format('Y-m-d');        
        return view('ShpInterfaces.revisarpedido',compact('nuevofolio'));
    }


    public function insertarCarrito(Request $request,$folio)
    {
        $venta = new Ventas();
        $venta->folio=$folio;
        $venta->fecha=now()->format('Y-m-d');
        $venta->baja=1;
        $venta->id_user=auth()->id();
        /*
         * Estados de las ventas:
         * EN PROCESO = La venta se proceso, aún no tiene asignada comisión
         * FINALIZADA = La venta ha generado comisión al lider de ventas.
         * CANCELADA  = La venta no ha sido procesada, el usuario pudo salir de la página o simplemente decidio no comprar. 
         */
        $venta->estado="EN PROCESO";
        $venta->save();
        $arrayCarrito=Cart::getContent();
        $arrayCarrito->each(function($item,Request $request)
        {
            $item->id; // the Id of the item
            $item->name; // the name
            $item->price; // the single price without conditions applied
            $item->quantity; // the quantity
            
            $dvp=new Dvp();
            $dvp->folio_venta=$request->input('folio');
            $dvp->code_producto=$item->id;
            $dvp->costo=$item->price;
            $dvp->cantidad=$item->quantity;
            $dvp->save();
        });

        return "Guarde el(los) registro(s)";
    }

}
