<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioContacto;
use Alert;
use Redirect;
use App\Producto;

class PaginasController extends Controller
{
    public function index()
    {       
    	$productos=Producto::first()
            ->take(4)
            ->get();
        return view('inicio', compact('productos'));
    }

    public function catalogo(Request $request)
    {       
        $buscar=$request->get('buscar');
    	$productos=Producto::where('baja','=',1)->where('nombre','like','%'.$buscar.'%')->orderBy('nombre','asc')->paginate(9);        
        return view('ShpInterfaces.catalogo', ['productos'=>$productos,'buscar'=>$buscar]);
    }

    public function detalle($slug)
    {
        $detalle=Producto::where('slug','=', $slug)->firstOrFail();
        return view('ShpInterfaces.detalle',compact('detalle'));
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
        Mail::to('daniel29_oct@hotmail.com')->send(new FormularioContacto($mensaje));        
        alert()->success('LIN LIFE', 'Gracias! Nos pondremos en contacto a la brevedad.');
        return Redirect::to('/contacto');   
    }
}
