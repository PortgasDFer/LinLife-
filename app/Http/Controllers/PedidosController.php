<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Domicilio;
use App\Producto;
use Alert;
use Redirect,Response;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = User::find(auth()->id());
        $domicilios=Domicilio::where('id_user','=',$usuario->id)->get();
        return view('UsrInterfaces.pedidos', compact('usuario', 'domicilios'));
    }


    public function automaticos()
    {
        $usuario = User::find(auth()->id());
        $domicilios=Domicilio::where('id_user','=',$usuario->id)->get();
        return view('UsrInterfaces.pedidos-automaticos',compact('domicilios'));
    }

    public function cobrosComisiones()
    {
        return view('UsrInterfaces.cobroscomisiones');
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
