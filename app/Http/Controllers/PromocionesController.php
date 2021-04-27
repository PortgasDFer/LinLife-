<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Promocion;
use Alert;
use Redirect,Response;
use DataTables;

class PromocionesController extends Controller
{
    
    public function datatable()
    {
        $promociones=Promocion::join('productos','promociones.code_producto','=','productos.code')
        ->select(array('productos.nombre','promociones.descripcion','promociones.unidades','promociones.costo','promociones.id'))
        ->where('promociones.baja','=',0);
        return DataTables::of($promociones)
        ->addColumn('edit','AdmInterfaces.IntPromociones.botones.edit')
        ->addColumn('delete','AdmInterfaces.IntPromociones.botones.delete')
        ->rawColumns(['edit','delete'])
        ->toJson();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdmInterfaces.IntPromociones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos=Producto::all();
        return view('AdmInterfaces.IntPromociones.create',compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promocion = new Promocion();
        $request->validate([            
            'code'      => 'required',
            'unidades'        => 'required|numeric|min:1',
            'costo'     => 'required|numeric',
            'descripcion'     => 'required|min:10',
        ]);
        $promocion->descripcion=$request->input('descripcion');
        $promocion->code_producto=$request->input('code');
        $promocion->costo=$request->input('costo');
        $promocion->unidades=$request->input('unidades');
        $promocion->baja=0;
        $promocion->save();
        alert()->success('LIN LIFE', 'Promoción agregada correctamente');
        return Redirect::to('/promociones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos=Producto::all();
        $promocion=Promocion::find($id)->firstOrFail();
        return view('AdmInterfaces.IntPromociones.edit',compact('promocion','productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $promocion=Promocion::find($id)->firstOrFail();
         $request->validate([            
            'code'      => 'required',
            'unidades'        => 'required|numeric|min:1',
            'costo'     => 'required|numeric',
            'descripcion'     => 'required|min:10',
        ]);
        $promocion->descripcion=$request->input('descripcion');
        $promocion->code_producto=$request->input('code');
        $promocion->costo=$request->input('costo');
        $promocion->unidades=$request->input('unidades');
        $promocion->baja=0;
        $promocion->save();
        alert()->success('LIN LIFE', 'Promoción editada correctamente');
        return Redirect::to('/promociones');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promocion=Promocion::find($id)->firstOrFail();
        $promocion->baja=1;
        $promocion->save();
        alert()->warning('LIN LIFE', 'Promoción eliminada');
        return Redirect::to('/promociones');
    }
}
