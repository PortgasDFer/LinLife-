<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Alert;
use Redirect,Response;
use Cart;
use App\Producto;
use App\Ventas;
use App\Domicilio;

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


}
