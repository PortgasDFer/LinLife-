<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;
use App\Comision;

class ComisionesController extends Controller
{
    public function asignarComision(Request $request)
    {
    	$comision = new Comision();
    	$comision->fecha=now()->format('Y-m-d');
    }
}
