<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function catalogo()
    {       
    	$productos=Producto::all();
        return view('ShpInterfaces.catalogo', compact('productos'));
    }

    public function detalle($slug)
    {
        $detalle=Producto::where('slug','=', $slug)->firstOrFail();
        return view('ShpInterfaces.detalle',compact('detalle'));
   	}

   	public function contacto()
    {           	
        return view('ShpInterfaces.contacto');
    }
}
