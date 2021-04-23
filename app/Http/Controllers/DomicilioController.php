<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Domicilio;
use Alert;
use Redirect,Response;
use DataTables;


class DomicilioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usu = User::find(auth()->id());
        $dom=Domicilio::where('id_user','=',auth()->id())->get();            
        return view('UsrInterfaces.domicilios', compact('usu','dom'));
    }

    public function datatable()
    {
        $domicilios=Domicilio::query()->where('domicilios.id_user','=',auth()->id());
        return DataTables::of($domicilios)
                ->addColumn('edit','UsrInterfaces.Domicilios.botones.edit')
                ->addColumn('delete','UsrInterfaces.Domicilios.botones.delete')
                ->rawColumns(['edit','delete'])
                ->toJson();  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('UsrInterfaces.Domicilios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([            
            'nombre'      => 'required|min:4',
            'calle'        => 'required|min:4',
            'noext'     => 'required|numeric',
            'cp'     => 'required|numeric',
            'descripcion'     => 'required|min:10',
        ]);

        $domicilio = new Domicilio();
        $domicilio->nombre=$request->input('nombre');
        $domicilio->calle=$request->input('calle');
        $domicilio->noext=$request->input('noext');
        $domicilio->noint=$request->input('noint');
        $domicilio->cp=$request->input('cp');
        $domicilio->colonia=$request->input('colonia');
        $domicilio->localidad=$request->input('localidad');
        $domicilio->entidad=$request->input('estado');
        $domicilio->descripcion=$request->input('descripcion');
        $domicilio->id_user=auth()->id();
        $domicilio->save();
        alert()->success('LIN LIFE', 'Domicilio registrado correctamente');
        return Redirect::to('/domicilios');
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
        $dom=Domicilio::find($id);
        return view('UsrInterfaces.Domicilios.edit',compact('dom'));
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
        $domicilio = Domicilio::find($id);

        $request->validate([            
            'nombre'      => 'required|min:4',
            'calle'        => 'required|min:4',
            'noext'     => 'required|numeric',
            'cp'     => 'required|numeric',
            'descripcion'     => 'required|min:10',
        ]);

        $domicilio->nombre=$request->input('nombre');
        $domicilio->calle=$request->input('calle');
        $domicilio->noext=$request->input('noext');
        $domicilio->noint=$request->input('noint');
        $domicilio->cp=$request->input('cp');
        $domicilio->colonia=$request->input('colonia');
        $domicilio->localidad=$request->input('localidad');
        $domicilio->entidad=$request->input('estado');
        $domicilio->descripcion=$request->input('descripcion');
        $domicilio->id_user=auth()->id();
        $domicilio->save();
        alert()->success('LIN LIFE', 'Domicilio actualizado correctamente');
        return Redirect::to('/domicilios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domicilio $domicilio)
    {
        $domicilio->delete();
        alert()->info('LIN LIFE', 'Domicilio eliminado');
        return Redirect::to('/domicilios');
    }
}
