<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str as Str;
use App\Domicilio;
use App\User;
use App\Role;
use App\Comision;
use App\Ventas;
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
        $users=User::all()->count();
        $verificados=User::where('status_cuenta','=','VERIFICADO')->count();
        return view('AdmInterfaces.IntUsers.index',compact('users','verificados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('UsrInterfaces.invitar');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre'     => ['required', 'string', 'max:50'],
            'apaterno'   => ['required','string','max:35'],
            'amaterno'   => ['required','string','max:35'],
            'email'      => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'sexo'       => ['required'],
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
            'beneficiario'     => ['required','string','min:4'],
            'invitacion' => ['required'],
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


    }
    public function invitar(Request $request)
    {
        $validate = $request->validate([
            'nombre'     => ['required', 'string', 'max:50'],
            'apaterno'   => ['required','string','max:35'],
            'amaterno'   => ['required','string','max:35'],
            'email'      => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'sexo'       => ['required'],
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
            'beneficiario'     => ['required','string','min:4'],
            'invitacion' => ['required'],
        ]);

        $user=new User();
        $user->name=$request->input('nombre');
        $user->aPaterno=$request->input('apaterno');
        $user->aMaterno=$request->input('amaterno');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->sexo=$request->input('sexo');
        $user->telcasa=$request->input('telefono');
        $user->telcel=$request->input('cel');
        if($request->hasfile('frente')){
            $frente=$request->file('frente');
            $filename= time().$frente->getClientOriginalExtension();
            $image= Image::make($frente)->encode('webp',90)->save(public_path('/identificaciones/' . $filename.'.webp'));
            $user->frente=$filename;
        }else{
            $user->frente="";
        }
        if($request->hasfile('atras')){
            $atras=$request->file('atras');
            $filename_atras= time(). '.' .$atras->getClientOriginalExtension();
            $image= Image::make($atras)->encode('webp',90)->save(public_path('/identificaciones/' . $filename_atras.'.webp'));
            $user->atras=$filename_atras;
        }else{
            $user->atras="";
        }
        $user->curp=$request->input('curp');
        $user->fechanac=$request->input('fecha');
        $user->estado_civil=$request->input('estado-civil');
        $user->slug=Str::slug($user->name.time());
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());
      
        $domicilio = new Domicilio();
        $domicilio->nombre="Principal";
        $domicilio->calle=$request->input('calle');
        $domicilio->noext=$request->input('ext');
        $domicilio->noint=$request->input('int');
        $domicilio->cp=$request->input('cp');
        $domicilio->colonia=$request->input('colonia');
        $domicilio->localidad=$request->input('localidad');
        $domicilio->entidad=$request->input('entidad');
        $domicilio->id_user=$user->id;
        $domicilio->descripcion=$request->input('descripcion');
        $domicilio->save();

        //dd($domicilio);
        alert()->success('LIN LIFE', 'Datos del usuario actualizados correctamente');
        return Redirect::to('/home');

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
            $file_path = public_path() . "/identificaciones/$user->frente";
            \File::delete($file_path);
            $frente=$request->file('frente');
            $filename= time().$frente->getClientOriginalExtension();
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
        $user->estado_civil=$request->input('estado-civil');
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


    public function identificaciones()
    {
        $users=User::all()->count();
        $verificados=User::where('status_cuenta','=','VERIFICADO')->count();
        $pendientes=User::where('status_cuenta','=','PENDIENTE')->count();

        $verificar=User::select('users.name','users.aPaterno','users.aMaterno','domicilios.localidad','domicilios.colonia','domicilios.entidad','users.slug','users.status_cuenta')
        ->join("domicilios","domicilios.id_user","=","users.id")
        ->where('users.status_cuenta','=','PENDIENTE')
        ->paginate(10);
        return view('AdmInterfaces.IntUsers.validaciones',compact('users','verificados','pendientes','verificar'));
    }

    public function verificados()
    {
        $users=User::all()->count();
        $Noverificados=User::where('status_cuenta','=','VERIFICADO')->count();
        $pendientes=User::where('status_cuenta','=','PENDIENTE')->count();
        $verificados=User::select('users.name','users.aPaterno','users.aMaterno','domicilios.localidad','domicilios.colonia','domicilios.entidad','users.slug','users.status_cuenta')
        ->join("domicilios","domicilios.id_user","=","users.id")
        ->where('users.status_cuenta','=','VERIFICADO')
        ->paginate(10);
        return view('AdmInterfaces.IntUsers.verificados', compact('Noverificados', 'pendientes', 'verificados'));
    }

    public function verificarUsuario($slug)
    {
        $user=User::where('slug','=',$slug)->firstOrFail();
        $domicilio = Domicilio::where('id_user','=',$user->id)->firstOrFail();
        return view('AdmInterfaces.IntUsers.verificar',compact('user','domicilio'));
    }

    public function usuarioverificado($slug)
    {
        $user=User::where('slug','=',$slug)->firstOrFail();
        $domicilio = Domicilio::where('id_user','=',$user->id)->firstOrFail();
        $invitados=$user::where('invitacion','=',$user->code)->get();
        $noInvitados=$user::where('invitacion','=',$user->code)->count();
        $porcentaje=$noInvitados/10*100;

        $dt = Carbon::now();
        $inicioSemana=$dt->startOfWeek()->format('Y/m/d');
        $finSemana=$dt->endOfWeek()->format('Y/m/d');

        $numComisiones=Comision::whereBetween('fecha', [$inicioSemana, $finSemana])
                                    ->where('id_user','=',$user->id)
                                    ->count();

        $comisiones=Comision::whereBetween('fecha', [$inicioSemana, $finSemana])
                                    ->where('id_user','=',$user->id)
                                    ->get();

        
        $totalComisiones=0.0;       
        foreach ($comisiones as $comision) {
            $totalComisiones+=$comision->total_comision;
        }

        

        return view('AdmInterfaces.IntUsers.usuarioverificado',compact('user','domicilio','invitados','noInvitados','porcentaje','dt','inicioSemana','finSemana','numComisiones','comisiones','totalComisiones'));
    }

    public function statusCuenta(Request $request, $slug)
    {
        $user=User::where('slug','=',$slug)->firstOrFail();
        $user->status_cuenta=$request->input('status');
        if($user->status_cuenta=='VERIFICADO'){
            $user->code=$user->id;
        }
        $user->save();
        alert()->success('LIN LIFE', 'Status de cuenta actualizado con ??xito');
        return Redirect::to('/validar-identidades');
    }

    public function validarCodigo($code)
    {
        $usuario=User::where('code','=',$code)->firstOrFail();
        return Response::json($usuario);
    }

    public function subirIdentificacion()
    {        
        return view('UsrInterfaces.identificaciones');
    }

    public function guardarIne(Request $request, $slug)
    {
        $user=User::where('slug','=',$slug)->firstOrFail();
        if($request->hasfile('frente')){
            $frente=$request->file('frente');
            $filename= time(). '.'. $frente->getClientOriginalExtension();
            $image= Image::make($frente)->encode('webp',90)->save(public_path('/identificaciones/' . $filename.'.webp'));
            $user->frente=$filename;
        }
         if($request->hasfile('atras')){
            $atras=$request->file('atras');
            $filename_atras= time(). '.' .$atras->getClientOriginalExtension();
            $image= Image::make($atras)->encode('webp',90)->save(public_path('/identificaciones/' . $filename_atras.'.webp'));
            $user->atras=$filename_atras;
        }
        
        $user->save();
        alert()->success('LIN LIFE', 'Identificaciones cargadas con ??xito ');
        return Redirect::to('/subir-identificacion');
    }

    public function frente(Request $request, $id)
    {
        $user=User::find($id);
        $request->validate([
            'frente'        => 'required'
        ]);        
         if($request->hasfile('frente')){
            $file_path = public_path() . "/identificaciones/$user->frente";
            \File::delete($file_path);
            $frente=$request->file('frente');
            $filename= time().$frente->getClientOriginalExtension();
            $image= Image::make($frente)->encode('webp',90)->save(public_path('/identificaciones/' . $filename.'.webp'));
            $user->frente=$filename;
        }
        $user->save();
        alert()->success('LIN LIFE', 'Parte de enfrente cargada con ??xito');
        return Redirect::to('/subir-identificacion');
    }

    public function atras(Request $request, $id)
    {
        $user=User::find($id);
        $request->validate([
            'atras'        => 'required'
        ]);        
         if($request->hasfile('atras')){
            $file_path = public_path() . "/identificaciones/$user->atras";
            \File::delete($file_path);
            $atras=$request->file('atras');
            $filename= time().$atras->getClientOriginalExtension();
            $image= Image::make($atras)->encode('webp',90)->save(public_path('/identificaciones/' . $filename.'.webp'));
            $user->atras=$filename;
        }
        $user->save();
        alert()->success('LIN LIFE', 'Parte de atras cargada con ??xito');
        return Redirect::to('/subir-identificacion');
    }

    public function desglose($slug)
    {
        $usuario=User::where('slug','=',$slug)->firstOrFail();
        return view('UsrInterfaces.Ingresos.desglose',compact('usuario'));
    }

    public function mes($slug)
    {
        $usuario=User::where('slug','=',$slug)->firstOrFail();
        $dt=Carbon::now();
        $inicioMes=$dt->startOfMonth()->format('Y-m-d');
        $finMes=$dt->endOfMonth()->format('Y-m-d');
        $asociados=User::where('invitacion','=',$usuario->code)->get();
        $comisiones=Comision::whereBetween('fecha', [$inicioMes, $finMes])
                                    ->where('id_user','=',$usuario->id)
                                    ->get();
        $totalComisiones=0.0;       
        foreach ($comisiones as $comision) {
            $totalComisiones+=$comision->total_comision;
        }
        $numComisiones=Comision::where('id_user','=',$usuario->id)->count();

        return view('UsrInterfaces.Ingresos.mes',compact('usuario','dt','numComisiones','totalComisiones'));
    }

    public function semana($slug)
    {
        $usuario=User::where('slug','=',$slug)->firstOrFail();
        $dt = Carbon::now();
        $inicioSemana=$dt->startOfWeek()->format('Y-m-d');
        $finSemana=$dt->endOfWeek()->format('Y-m-d');

        $numComisiones=Comision::whereBetween('fecha', [$inicioSemana, $finSemana])
                                    ->where('id_user','=',$usuario->id)
                                    ->count();

        $comisiones=Comision::whereBetween('fecha', [$inicioSemana, $finSemana])
                                    ->where('id_user','=',$usuario->id)
                                    ->get();

        
        $totalComisiones=0.0;       
        foreach ($comisiones as $comision) {
            $totalComisiones+=$comision->total_comision;
        }

        return view('UsrInterfaces.Ingresos.semana',compact('usuario','dt','numComisiones','totalComisiones'));
    }

    
}
