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
        //return $usuario;        
        return view('UsrInterfaces.domicilios', compact('usu','dom'));
    }

    public function datatable()
    {
        $domicilios=Domicilio::all();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
