<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioContacto;
use Alert;
use Redirect;
use App\Producto;
use App\User;

class PaginasController extends Controller
{
    public function index()
    {       
    	$productos=Producto::where('baja','=',1)
            ->take(4)
            ->get();
        $users=User::where('baja','=',0)->orderBy('created_at','desc')->take(6)->get();
        return view('inicio', compact('productos', 'users'));
    }

    public function catalogo(Request $request)
    {            
        $buscar=$request->get('buscar'); 
        $query = Producto::where('baja','=',1)->where('nombre','like','%'.$buscar.'%')->orderBy('nombre','asc'); 
        $min=$request->get('minimo');  
        $max=$request->get('maximo');         
        if($min && $max){
            $query = $query->where('precio_publico','>=',$min);
            $query = $query->where('precio_publico','<=',$max);
        }
        $productos = $query->paginate(9);
        return view('ShpInterfaces.catalogo', ['productos'=>$productos,'buscar'=>$buscar] ,compact('productos'));
    }

    public function detalle($slug)
    {
        $detalle=Producto::where('slug','=', $slug)->firstOrFail();
        return view('ShpInterfaces.detalle',compact('detalle'));
   	}


    public function negocio()
    {
        
        return view('ShpInterfaces.negocio');
    }

    public function nosotros()
    {
        
        return view('ShpInterfaces.nosotros');
    }

    public function contacto(Request $request)
    {
        
        return view('ShpInterfaces.contacto');
    }

    public function mensaje(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email:rfc,dns',
            'tema' => 'required',
            'mensaje' => 'required|max:200',            
        ]);

        $mensaje = $request->all();
        Mail::to('ventas2@linlife.com.mx')->send(new FormularioContacto($mensaje));        
        alert()->success('LIN LIFE', 'Gracias! Nos pondremos en contacto a la brevedad.');
        return Redirect::to('/contacto');   
    }
}
