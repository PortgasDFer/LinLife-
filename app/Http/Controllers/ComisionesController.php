<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;
use App\Comision;
use Carbon\Carbon;
use Alert;
use Redirect,Response;

class ComisionesController extends Controller
{
    public function asignar(Request $request,$folio)
    {
    	$venta=Ventas::where('folio','=',$folio)->firstOrFail();

    	$comision = new Comision();
    	
    	$comision->porcentaje=$request->input('porcentaje');
    	$comision->total_comision=$request->input('cantidad');
    	$comision->id_user=$request->input('id_user');
    	$comision->folio_venta=$venta->folio;
    	$comision->fecha=now()->format('Y-m-d');
    	$comision->save();

    	$venta->total_final=$venta->total-$comision->total_comision;
    	$venta->estado="FINALIZADA";
    	$venta->save();

    	alert()->success('LIN LIFE', 'Comisión otorgada al lider de venta!');
    	return Redirect::to('/listado-de-ventas');

    }

    public function all(Request $request)
    {
        //$comisiones = \DB::table('comisiones')
        //->select('comisiones.*')
        //->orderby('id_comision', 'DESC')
        //->get();

        //return response(json_encode($comisiones),200)->header('Content-type', 'text/plain');
        return "Hola";
    }
}
