<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Domicilio;
use App\Producto;
use App\Ventas;

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
           
            return view('userdashboard',compact('domicilio'));
        } else{
            $noProductos=Producto::all()->count();
            $noUsuarios=User::all()->count();
            $noVentas=Ventas::all()->count();
            $ventas=Ventas::join('users','ventas.id_user','=','users.id')
            ->select(array('users.name','users.aPaterno','users.aMaterno','ventas.folio','ventas.fecha','ventas.total'))
            ->where('ventas.baja','=',1)
            ->take(5)
            ->get();
            $ventas=Ventas::join('users','ventas.id_user','=','users.id')
            ->select(array('users.name','users.aPaterno','users.aMaterno','ventas.folio','ventas.fecha','ventas.total'))
            ->where('ventas.baja','=',1)
            ->take(5)
            ->get();
            return view('dashboard',compact('noProductos','noUsuarios','noVentas','ventas'));
        }
        //return view('dashboard');
    }
    
}
