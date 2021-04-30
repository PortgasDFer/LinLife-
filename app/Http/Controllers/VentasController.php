<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Ventas;
use App\Producto;
use App\User;
use App\Domicilio;
use Alert;
use Redirect,Response;
use DataTables;

class VentasController extends Controller
{
    public function datatable()
    {
    	$ventas=Ventas::where('baja','=',1)->get();
    	return DataTables::of($ventas)
                ->addColumn('promos','AdmInterfaces.IntProductos.botones.promos')
                ->addColumn('ingreso','AdmInterfaces.IntProductos.botones.ingreso')
                ->rawColumns(['promos','ingreso'])
                ->toJson();
    }

    public function store(Request $request)
    {
        $venta=new Ventas();
        $venta->folio=$request->input('folio');
        $venta->fecha=$request->input('fecha');        
        $venta->baja=1;
        $venta->id_user=auth()->id();
        $venta->save();
        $datos=Ventas::find($venta->folio);
        $usuario = User::find(auth()->id());
        $domicilios=Domicilio::where('id_user','=',$usuario->id)->get();
        $productos=Producto::all();
        $tabla =    DB::table('ventas')
                    ->join('dvp','ventas.folio','=','dvp.folio_venta')
                    ->join('productos','productos.code','=','dvp.code_producto')
                    ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                    ->where('ventas.folio','=',$venta->folio)
                    ->get();
        alert()->success('LIN LIFE', 'Comience a agregar productos');
        return view('UsrInterfaces.pedidos',compact('datos','tabla','usuario', 'domicilios','productos'));
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
}
