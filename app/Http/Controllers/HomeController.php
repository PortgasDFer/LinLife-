<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Domicilio;
use App\Producto;
use App\Ventas;
use App\Comision;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        if($request->user()->hasRole('user')){
            $usuario = User::find(auth()->id());
            $domicilio=Domicilio::where('id_user','=',$usuario->id)->first();
            $ventas=Ventas::where('id_user','=',$usuario->id)->count();
            $invitados=User::where('invitacion','=',$usuario->code)->count();
            $ventas_tabla=Ventas::where('id_user','=',$usuario->id)->get();

            $comisiones = Comision::where('id_user','=',$usuario->id)->get();
            $ingresos=0.0;
            foreach ($comisiones as $c) {
                $ingresos+=$c->total_comision;
            }
            return view('userdashboard',compact('domicilio','ventas','invitados','ventas_tabla','ingresos'));
        } else{
            $noProductos=Producto::all()->count();
            $noUsuarios=User::all()->count();
            $noVentas=Ventas::where('baja','=',1)->where('tipo','=','VENTA')->count();
            $noVentasPromocion=Ventas::where('baja','=',1)->where('tipo','=','PROMOCION')->count();
            $ventas=Ventas::join('users','ventas.id_user','=','users.id')
            ->select(array('users.name','users.aPaterno','users.aMaterno','ventas.folio','ventas.fecha','ventas.total'))
            ->where('ventas.baja','=',1)
            ->where('ventas.tipo','=','VENTA')
            ->take(5)
            ->get();
            $ventas=Ventas::join('users','ventas.id_user','=','users.id')
            ->select(array('users.name','users.aPaterno','users.aMaterno','ventas.folio','ventas.fecha','ventas.total','ventas.estado'))
            ->where('ventas.baja','=',1)
            ->where('ventas.tipo','=','VENTA')
            ->take(5)
            ->get();

            $ventas_promocion=Ventas::join('users','ventas.id_user','=','users.id')
            ->select(array('users.name','users.aPaterno','users.aMaterno','ventas.folio','ventas.fecha','ventas.total'))
            ->where('ventas.baja','=',1)
            ->where('ventas.tipo','=','PROMOCION')
            ->take(5)
            ->get();
            $ventas_promocion=Ventas::join('users','ventas.id_user','=','users.id')
            ->select(array('users.name','users.aPaterno','users.aMaterno','ventas.folio','ventas.fecha','ventas.total','ventas.estado'))
            ->where('ventas.baja','=',1)
            ->where('ventas.tipo','=','PROMOCION')
            ->take(5)
            ->get();
            return view('dashboard',compact('noProductos','noUsuarios','noVentas','ventas','ventas_promocion', 'noVentasPromocion'));
        }
        //return view('dashboard');
    }
    
}
