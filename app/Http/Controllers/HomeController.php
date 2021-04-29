<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Domicilio;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        if($request->user()->hasRole('user')){
            $usuario = User::find(auth()->id());
            $domicilio=Domicilio::where('id_user','=',$usuario->id)->first();
           
            return view('userdashboard',compact('domicilio'));
        } else{
            return view('dashboard');
        }
        //return view('dashboard');
    }
    
}
