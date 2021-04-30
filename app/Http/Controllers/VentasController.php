<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;
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
}
