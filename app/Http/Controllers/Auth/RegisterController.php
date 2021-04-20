<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use Image;
use App\Domicilio;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre'     => ['required', 'string', 'max:50'],
            'apaterno'   => ['required','string','max:35'],
            'amaterno'   => ['required','string','max:35'],
            'email'      => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $request = app('request');
        if($request->hasfile('frente')){
            $frente=$request->file('frente');
            $filename= time(). '.'. $frente->getClientOriginalExtension();
            $image= Image::make($frente)->encode('webp',90)->save(public_path('/identificaciones/' . $filename.'.webp'));
        }
        if($request->hasfile('atras')){
            $atras=$request->file('atras');
            $filename_atras= time(). '.' .$atras->getClientOriginalExtension();
            $image= Image::make($atras)->encode('webp',90)->save(public_path('/identificaciones/' . $filename_atras.'.webp'));
        }
        $user = User::create([
            'name'      => $data['nombre'],
            'aPaterno'  => $data['apaterno'],
            'aMaterno'  => $data['amaterno'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'sexo'      => $data['sexo'],
            'telcasa'   => $data['telefono'],
            'telcel'    => $data['cel'],
            'frente'    => $data['frente'],
            'atras'     => $data['atras'],
            'curp'      => $data['curp'],
            'fechanac'  => $data['fecha'],
            'estado'    => $data['estado'],
            'invitacion'=> $data['invitacion'],
            'frente'    => $filename,
            'atras'     => $filename_atras,
            'baja'      => 0,

        ]);
        $user->roles()->attach(Role::where('name', 'user')->first());
        $domicilio = Domicilio::create([
            'calle' =>$data['calle'],
            'noext' =>$data['ext'],
            'noint' =>$data['int'],
            'cp'    =>$data['cp'],
            'colonia' =>$data['colonia'],
            'localidad'=>$data['localidad'],
            'entidad'   => $data['entidad'],
            'descripcion'=>$data['descripcion'],
            'id_user' => $user->id,
        ]);
        return $user;
    }

  
}
