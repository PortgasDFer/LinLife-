<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Domicilio;
use App\Producto;
use App\Ventas;
use App\Dvp;
use Alert;
use Redirect,Response;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function prepedido()
    {
        
    }


    public function automaticos()
    {
        $usuario = User::find(auth()->id());
        $domicilios=Domicilio::where('id_user','=',$usuario->id)->get();
        return view('UsrInterfaces.pedidos-automaticos',compact('domicilios'));
    }

    public function cobrosComisiones()
    {
        return view('UsrInterfaces.cobroscomisiones');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = User::find(auth()->id());
        $domicilios=Domicilio::where('id_user','=',$usuario->id)->get();
        $folio=$request->input('folio');
        $code=$request->input('code');
        $producto=Producto::find($code);
        $existente=$producto->cantidad;
        $productos=Producto::all();
        $datos=Ventas::find($folio);

        $tabla =  DB::table('ventas')
                ->join('dvp','ventas.folio','=','dvp.folio_venta')
                ->join('productos','productos.code','=','dvp.code_producto')
                ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                ->where('ventas.folio','=', $folio)
                ->get();

        foreach ($tabla as $t) {
            if($t->code==$code){
                $dvp=Dvp::find($t->id);
                $dvp->cantidad+=1;
                $dvp->save();
                $tabla =  DB::table('ventas')
                    ->join('dvp','ventas.folio','=','dvp.folio_venta')
                    ->join('productos','productos.code','=','dvp.code_producto')
                    ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                    ->where('ventas.folio','=',$folio)
                    ->get();
                alert()->success('LIN LIFE', 'Producto Agregado');
                return view('UsrInterfaces.pedidos',compact('datos','tabla','productos','domicilios','usuario'));
            }
        }

        $dvp=new Dvp();
        $restante=$request->input('cantidad');
        $dvp->folio_venta=$request->input('folio');
        $dvp->code_producto=$request->input('code');
        $dvp->costo=$request->input('precio');
        $dvp->cantidad=$request->input('cantidad');

        $tabla =  DB::table('ventas')
                ->join('dvp','ventas.folio','=','dvp.folio_venta')
                ->join('productos','productos.code','=','dvp.code_producto')
                ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                ->where('ventas.folio','=',$folio)
                ->get();

        /*Consultamos que contemos con más cantidad que la que se vendera*/
        if($existente<$restante){
            /*Si no contamos con mayor cantidad el sistema arrojará un mensaje de alerta y no permitira agregar el producto.*/
            alert()->error('LIN LIFE', 'No cuenta con esa cantidad de producto');
            return view('UsrInterfaces.pedidos',compact('datos','tabla','productos','domicilios','usuario'));
        }else{
            $producto->cantidad=$existente-$restante;
            $producto->save();
        }

        if(empty($dvp->costo)){
            /*En caso de no agregar precio al producto a la hora de realizar la nota de venta, se obtendra el precio previamente asignado al producto.*/
            $dvp->costo=$producto->pventa;
        }
        $dvp->save();

        $tabla =  DB::table('ventas')
                ->join('dvp','ventas.folio','=','dvp.folio_venta')
                ->join('productos','productos.code','=','dvp.code_producto')
                ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                ->where('ventas.folio','=',$folio)
                ->get();

        alert()->success('LIN LIFE', 'Producto Agregado');
        return view('UsrInterfaces.pedidos',compact('datos','tabla','productos','domicilios','usuario'));
    }

    public function detalleVenta($folio)
    {
        $venta =    DB::table('ventas')
                    ->join('dvp','ventas.folio','=','dvp.folio_venta')
                    ->join('productos','productos.code','=','dvp.code_producto')
                    ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                    ->where('ventas.folio','=',$folio)
                    ->get();
        return $venta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $usuario = User::find(auth()->id());
        $domicilios=Domicilio::where('id_user','=',$usuario->id)->get();
        $folio=$request->input('folio');
        $dvp=Dvp::find($id);
        $code=$request->input('code');
        $producto=Producto::find($code);
        $dvp->delete();
        $datos=Ventas::find($folio);

        $tabla =    DB::table('ventas')
                ->join('dvp','ventas.folio','=','dvp.folio_venta')
                ->join('productos','productos.code','=','dvp.code_producto')
                ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                ->where('ventas.folio','=', $folio)
                ->get();

        $productos=Producto::all();

        alert()->warning('LINF LIFE', 'Producto Eliminado');
        return view('UsrInterfaces.pedidos',compact('datos','tabla','productos','domicilios','usuario'));
    }

    public function detallePedido($folio)
    {
        $pedido=Ventas::join('dvp','ventas.folio','=','dvp.folio_venta')
                    ->join('productos','productos.code','=','dvp.code_producto')
                    ->select(array('productos.nombre','dvp.cantidad','dvp.costo','ventas.fecha','ventas.folio'))
                    ->where('ventas.folio','=', $folio)
                    ->get();
        return $pedido;

    }
}
