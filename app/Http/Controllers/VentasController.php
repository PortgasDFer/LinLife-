<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Ventas;
use App\Producto;
use App\Promocion;
use App\User;
use App\Dvp;
use App\Domicilio;
use Alert;
use Redirect,Response;
use DataTables;

class VentasController extends Controller
{
    public function index()
    {
        //
    }

    public function datatable()
    {
    	$ventas=Ventas::where('baja','=',1)->get();
    	return DataTables::of($ventas)
                ->addColumn('promos','AdmInterfaces.IntProductos.botones.promos')
                ->addColumn('ingreso','AdmInterfaces.IntProductos.botones.ingreso')
                ->rawColumns(['promos','ingreso'])
                ->toJson();
    }


    public function create()
    {   
        $foliobase=Ventas::select('folio')->orderby('folio','DESC')->first();
        $folionuevo=substr($foliobase,10,-8);
        $numero=substr($foliobase, 14,-2);
        $contador=$numero+1;
        $nuevofolio=$folionuevo.$contador;
        $fechaactual=now()->format('Y-m-d');

        $productos=Producto::all();
        return view('UsrInterfaces.pre-pedido', compact('nuevofolio','fechaactual','productos'));
    }

    public function indventas()
    {
        alert()->success('LIN LIFE', 'Pedido realizado con éxito');
        return Redirect::to('/home');
    }

    public function ventas()
    {
        return view('AdmInterfaces.IntVentas.index');
    }


    public function store(Request $request)
    {
        $venta=new Ventas();
        $venta->folio=$request->input('folio');
        $venta->fecha=$request->input('fecha');        
        $venta->baja=1;
        $venta->id_user=auth()->id();
        /*
         * Estados de las ventas:
         * EN PROCESO = La venta se proceso, aún no tiene asignada comisión
         * FINALIZADA = La venta ha generado comisión al lider de ventas.
         * CANCELADA  = La venta no ha sido procesada, el usuario pudo salir de la página o simplemente decidio no comprar. 
         */
        $venta->estado="EN PROCESO";
        $venta->tipo='VENTA';
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

    public function promocion(Request $request)
    {
        $venta=new Ventas();
        $venta->folio=$request->input('folio');
        $venta->fecha=$request->input('fecha');        
        $venta->baja=1;
        $venta->id_user=auth()->id();
        $venta->estado="EN PROCESO";
        $venta->tipo='PROMOCION';
        $venta->save();
        $datos=Ventas::find($venta->folio);
        $usuario = User::find(auth()->id());
        $domicilios=Domicilio::where('id_user','=',$usuario->id)->get();
        $promociones=Promocion::where('baja','=',0)->get();
        $tabla =    DB::table('ventas')
                    ->join('dvp','ventas.folio','=','dvp.folio_venta')
                    ->join('productos','productos.code','=','dvp.code_producto')
                    ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                    ->where('ventas.folio','=',$venta->folio)
                    ->get();
        alert()->success('LIN LIFE', 'Comience a agregar productos');
        return view('UsrInterfaces.pedidos-promociones',compact('datos','tabla','usuario', 'domicilios','promociones'));
    }

    public function detalleVenta($folio)
    {
        $detalle =    DB::table('ventas')
                    ->join('dvp','ventas.folio','=','dvp.folio_venta')
                    ->join('productos','productos.code','=','dvp.code_producto')
                    ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                    ->where('ventas.folio','=',$folio)
                    ->get();
        $venta = Ventas::where('folio','=',$folio)->firstOrFail();
        $asociado=Ventas::join('users','ventas.id_user','=','users.id')
            ->select(array('users.name','users.aPaterno','users.aMaterno','ventas.folio','ventas.fecha','ventas.total','users.invitacion'))
            ->where('ventas.folio','=',$folio)
            ->first();
        $liderVenta=User::where('code','=',$asociado->invitacion)->firstOrFail();

        return view('AdmInterfaces.IntVentas.detalle',compact('venta','detalle','asociado','liderVenta'));
    }

    public function detalleVentapromocion($folio)
    {
        $detalle =    DB::table('ventas')
                    ->join('dvp','ventas.folio','=','dvp.folio_venta')
                    ->join('productos','productos.code','=','dvp.code_producto')
                    ->select('productos.nombre','dvp.cantidad','dvp.costo','dvp.id','ventas.folio','productos.code')
                    ->where('ventas.folio','=',$folio)
                    ->get();
        $venta = Ventas::where('folio','=',$folio)->firstOrFail();
        $asociado=Ventas::join('users','ventas.id_user','=','users.id')
            ->select(array('users.name','users.aPaterno','users.aMaterno','ventas.folio','ventas.fecha','ventas.total','users.invitacion'))
            ->where('ventas.folio','=',$folio)
            ->first();
        $liderVenta=User::where('code','=',$asociado->invitacion)->firstOrFail();

        return view('AdmInterfaces.IntVentas.detallepromocion',compact('venta','detalle','asociado','liderVenta'));
    }

    public function historial()
    {
        $usuario = User::find(auth()->id());
        $ventas=Ventas::where('id_user','=',$usuario->id)->get();
        return view('UsrInterfaces.historial',compact('ventas'));
    }

}
