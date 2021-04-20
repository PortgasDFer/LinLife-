<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use App\Domicilio;
use App\User;
use App\Role;
use Redirect,Response;
use DataTables;
use Alert;
use Image;


class UsersController extends Controller
{
    
    /**
     * Display a datatable of the resource
     *
     * @return  list of resource
     */
    public function datatable()
    {
        $users=User::where('baja','=',0)->get();
        return DataTables::of($users)
                ->addColumn('edit','AdmInterfaces.IntUsers.botones.edit')
                ->addColumn('view','AdmInterfaces.IntUsers.botones.view')
                ->addColumn('delete','AdmInterfaces.IntUsers.botones.delete')
                ->rawColumns(['edit','view','delete'])
                ->toJson();  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdmInterfaces.IntUsers.index');
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre'     => ['required', 'string', 'max:50'],
            'apaterno'   => ['required','string','max:35'],
            'amaterno'   => ['required','string','max:35'],
            'email'      => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'sexo'       => ['required','string','max:10'],
            'calle'      => ['required','string'],
            'ext'        => ['required','string'],
            'cp'         => ['required','min:4'],
            'colonia'    => ['required'],
            'localidad'  => ['required'],
            'entidad'    => ['required'],
            'descripcion'=> ['required','string','min:10'],
            'telefono'   => ['required','numeric','min:10'],
            'cel'        => ['required','numeric','min:10'],
            'curp'       => ['required','string','min:18','max:18'],
            'fecha'   => ['required'],
            'entidad' => ['required'],
            'estado'     => ['required'],
            'invitacion' => ['required','string'],
        ]);
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
    public function show($slug)
    {
        $user=User::where('slug','=', $slug)->get();
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user=User::where('slug','=',$slug)->firstOrFail();
        $domicilio=Domicilio::where('id_user','=',$user->id)->firstOrFail();
        return view('AdmInterfaces.IntUsers.editar',compact('user','domicilio'));
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
        


        $user=User::find($id);
        $user->name=$request->input('nombre');
        $user->aPaterno=$request->input('apaterno');
        $user->aMaterno=$request->input('amaterno');
        $user->email=$request->input('email');
        $user->sexo=$request->input('sexo');
        $user->telcasa=$request->input('telefono');
        $user->telcel=$request->input('cel');
        $request = app('request');
        if($request->hasfile('frente')){
            $file_path = public_path() . "/identificaciones/$user->frente=$filename";
            \File::delete($file_path);
            $frente=$request->file('frente');
            $filename= time(). '.'. $frente->getClientOriginalExtension();
            $image= Image::make($frente)->encode('webp',90)->save(public_path('/identificaciones/' . $filename.'.webp'));
            $user->frente=$filename;
        }
        if($request->hasfile('atras')){
            $file_path = public_path() . "/identificaciones/$user->frente=$filename_atras";
            \File::delete($file_path);
            $atras=$request->file('atras');
            $filename_atras= time(). '.' .$atras->getClientOriginalExtension();
            $image= Image::make($atras)->encode('webp',90)->save(public_path('/identificaciones/' . $filename_atras.'.webp'));
            $user->atras=$filename_atras;
        }
        $user->curp=$request->input('curp');
        $user->fechanac=$request->input('fecha');
        $user->estado=$request->input('estado');
        $user->slug=Str::slug($user->name.time());
        $user->save();

        $domicilio = Domicilio::where('id_user','=',$user->id)->firstOrFail();
        $domicilio->calle=$request->input('calle');
        $domicilio->noext=$request->input('ext');
        $domicilio->noint=$request->input('int');
        $domicilio->cp=$request->input('cp');
        $domicilio->colonia=$request->input('colonia');
        $domicilio->localidad=$request->input('localidad');
        $domicilio->entidad=$request->input('entidad');
        $domicilio->descripcion=$request->input('descripcion');
        $domicilio->save();

        alert()->success('LIN LIFE', 'Datos del usuario actualizados correctamente');
        return Redirect::to('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $user=User::where('slug','=',$slug)->firstOrFail();
        $user->baja=1;
        $user->save();
        alert()->success('LIN LIFE', 'Usuario eliminado');
        return Redirect::to('/usuarios');
    }
}
