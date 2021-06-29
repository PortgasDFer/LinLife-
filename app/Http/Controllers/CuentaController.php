<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Domicilio;
use App\Ventas;
use Image;
use Alert;
use Redirect,Response;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = User::find(auth()->id());
        $domicilio=Domicilio::where('id_user','=',auth()->id())->get();
        //return $usuario;
        return view('UsrInterfaces.cuenta', compact('usuario','domicilio'));        
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

    public function datospersonales(Request $request, $id)
    {          
        $validate = $request->validate([
            'email' => 'required',
            'fecha' => 'required|max:200',
            'entidadnac' => 'required',
            //'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);           
        $user = User::find($id);
        $user->email=$request->input('email');
        $user->fechanac=$request->input('fecha');
        $user->entidadnac=$request->input('entidadnac');
        $user->save();
        alert()->success('LIN LIFE', 'Datos actualizados');
        return Redirect::to('/cuenta');
    }

    public function telefonos(Request $request, $id)
    {              
        $validate = $request->validate([
            'fijo'   => ['required','numeric','min:10','max'],
            'celular'   => ['required','numeric','min:10','max'],
            //'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);       
        $user = User::find($id);
        $user->telcasa=$request->input('fijo');
        $user->telcel=$request->input('celular');
        $user->save();
        alert()->success('LIN LIFE', 'Telefonos actualizados');
        return Redirect::to('/cuenta');
    }

    

    public function contraseña(Request $request, $id)
    {   
        $validate = $request->validate([
            'password'   => ['required'],
            //'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);                   
        $user = User::find($id);
        $user->password=Hash::make($request->input('password'));
        $user->save();
        alert()->success('LIN LIFE', 'Contraseña actualizada');
        return Redirect::to('/cuenta');
    }

    public function facturacion(Request $request, $id)
    {   
        $validate = $request->validate([
            'curp'   => ['required'],
            'banco'   => ['required'],
            'clabe'   => ['required'],  
            'rfc'   => ['required'],
            'constancia'   => ['required'],            
        ]);
        $user = User::find($id);

        if($request->hasFile('constancia')){
            $file = $request->file('constancia');
            $pdf = time().$file->getClientOriginalName();
            $file->move(public_path().'/constancias/',$pdf);
        }

        $user->curp=$request->input('curp');
        $user->banco=$request->input('banco');
        $user->clabe=$request->input('clabe');
        $user->rfc=$request->input('rfc');
        $user->constancia=$pdf;
        $user->save();
        alert()->success('LIN LIFE', 'Datos bancarios actualizados');
        return Redirect::to('/cuenta');

    }

    public function foto(Request $request, $id)
    {   
        $validate = $request->validate([
            'foto'   => ['required'],           
        ]);

        $user = User::find($id);

        if($request->hasFile('foto')){
             $file_path = public_path() . "/imgusers/$user->avatar";
            \File::delete($file_path);
            $file=$request->file('foto');
            $foto=time().$user->nombre.$file->getClientOriginalExtension();
            $image= Image::make($file)->encode('webp',90)->save(public_path('/imgusers/' . $foto.'.webp'));
            $user->avatar=$foto.'.webp';
        }
        $user->save();
        alert()->success('LIN LIFE', 'Foto de perfil actualizada');
        return Redirect::to('/cuenta');

    }


    public function detallesCuenta($slug)
    {
        $user=User::where('slug','=', $slug)->firstOrFail();
        if($slug!=\Auth::user()->slug){
            alert()->info('LIN LIFE',' Los datos de los perfiles son personales');
            $user=User::where('slug','=',\Auth::user()->slug)->firstOrFail();
        }
        $invitados=$user::where('invitacion','=',$user->code)->get();
        
        $noInvitados=$user::where('invitacion','=',$user->code)->count();

        $porcentaje=$noInvitados/10*100;


        
        return view('UsrInterfaces.detalles',compact('user','invitados','porcentaje'));
    }

    public function miEstructura($slug)
    {
        $user=User::where('slug','=', $slug)->firstOrFail();
        if($slug!=\Auth::user()->slug){
            alert()->info('LIN LIFE',' Los datos de los perfiles son personales');
            $user=User::where('slug','=',\Auth::user()->slug)->firstOrFail();
        }
        $invitados=$user::where('invitacion','=',$user->code)->get();
        
        $noInvitados=$user::where('invitacion','=',$user->code)->count();
        $domicilio=Domicilio::where('id_user','=',$user->id)->firstOrFail();

        $noVentas=Ventas::where('id_user','=',$user->id)->count();

        $porcentaje=$noInvitados/10*100;
        return view('UsrInterfaces.estructura',compact('user','invitados','porcentaje','domicilio','noInvitados','noVentas'));
    }
    
    public function miLista($slug)
    {
        $user=User::where('slug','=', $slug)->firstOrFail();
        if($slug!=\Auth::user()->slug){
            alert()->info('LIN LIFE',' Los datos de los perfiles son personales');
            $user=User::where('slug','=',\Auth::user()->slug)->firstOrFail();
        }
        $invitados=User::select('users.name','users.aPaterno','users.aMaterno','domicilios.localidad','domicilios.colonia','domicilios.entidad','users.slug','users.status_cuenta','users.telcasa','users.telcel','users.email','users.fechanac')
        ->join("domicilios","domicilios.id_user","=","users.id")
        ->where('users.invitacion','=',$user->code)
        ->get();
        return view('UsrInterfaces.lista',compact('user','invitados'));
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
