<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Alert;
use Redirect,Response;

class DvpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $folio=$request->input('folio');
        $producto=Producto::find($code);
        return view('pedidos',compact('productos'));

        $tabla =    DB::table('ventas')


        foreach ($tabla as $t) {
            if($t->code==$code){
                $dvp=Dvp::find($t->id);
                $dvp->cantidad+=1;
                $dvp->save();
                $tabla = DB::table('ventas')
                    ->join('dvp','ventas.folio','=','dvp.folio_venta')
                    ->join('productos','productos.code','=','dvp.code_producto')
                    ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                    ->where('ventas.folio','=',$folio)
                    ->get();
                alert()->success('LIN LIFE', 'Producto Agregado');
                return view('UsrInterfaces.pedidos',compact('datos','tabla','productos'));
            }
        }

        $dvp=new Dvp();
        $restante=$request->input('cantidad');
        $dvp->folio_venta=$request->input('folio');
        $dvp->code_producto=$request->input('codebar');
        $dvp->costo=$request->input('precio');
        $dvp->cantidad=$request->input('cantidad');

        $tabla = DB::table('ventas')
                    ->join('dvp','ventas.folio','=','dvp.folio_venta')
                    ->join('productos','productos.code','=','dvp.code_producto')
                    ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                    ->where('ventas.folio','=',$folio)
                    ->get();

        /*Consultamos que contemos con más cantidad que la que se vendera*/
        if($existente<$restante){
            /*Si no contamos con mayor cantidad el sistema arrojará un mensaje de alerta y no permitira agregar el producto.*/
            alert()->error('LIN LIFE', 'No cuenta con esa cantidad de producto');
            return view('UsrInterfaces.pedidos',compact('datos','tabla','productos'));
        }else{
            $producto->cantidad=$existente-$restante;
            $producto->save();
        }

        if(empty($dvp->costo)){
            /*En caso de no agregar precio al producto a la hora de realizar la nota de venta, se obtendra el precio previamente asignado al producto.*/
            $dvp->costo=$producto->precio_publico;
        }

        $dvp->save();
        $tabla = DB::table('ventas')
                    ->join('dvp','ventas.folio','=','dvp.folio_venta')
                    ->join('productos','productos.code','=','dvp.code_producto')
                    ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                    ->where('ventas.folio','=',$folio)                
                    ->get();


        alert()->success('LIN LIFE', 'Producto agregado');
        return view('UsrInterfaces.pedidos',compact('datos','tabla','productos'));

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
    public function destroy($id)
    {
        //
    }
}
