<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Image;
use Alert;
use Redirect,Response;
use DataTables;


class ProductosController extends Controller
{
    
    /**
     * Display a datatable of the resource
     *
     * @return  list of resource
     */
    public function datatable()
    {
        $productos=Producto::all();
        return DataTables::of($productos)
                        ->addColumn('edit','AdmInterfaces.IntProductos.botones.edit')
                        ->addColumn('delete','AdmInterfaces.IntProductos.botones.delete')
                        ->rawColumns(['edit','delete'])
                        ->toJson();  
    }


    /**
     * Display a listing of the resource.
     *
     * @return list of resource
     */
    public function index()
    {
        return view('AdmInterfaces.IntProductos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdmInterfaces.IntProductos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        //return $request;
        $request->validate([
            'code'        => 'required|min:2',
            'nombre'      => 'required|min:4',
            'dist'        => 'required|min:4',
            'publico'     => 'required|min:4',
            'nivel-1'     => 'required',
            'nivel-2'     => 'required',
            'nivel-3'     => 'required',
            'imagen'      => 'required|image'
        ]);

        $producto->code=$request->input('code');
        $producto->nombre=$request->input('nombre');
        $producto->valor_dist=$request->input('dist');
        $producto->precio_publico=$request->input('publico');
        $producto->nivel_1=$request->input('nivel-1');
        $producto->nivel_2=$request->input('nivel-2');
        $producto->nivel_3=$request->input('nivel-3');
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $foto=$producto->nombre.$file->getClientOriginalExtension();
            $image= Image::make($file)->encode('webp',90)->save(public_path('/productoimg/' . $foto.'.webp'));
            $producto->imagen=$foto.'.webp';
        }
        $producto->save();
        alert()->success('LIN LIFE', 'Producto registrado correctamente');
        return Redirect::to('/productos');


    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'code.required' => 'Cagaste Light.',
            'nombre.required' => 'Cagaste Light.',
        ];
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
    public function edit($code)
    {
        $producto=Producto::find($code)->firstOrFail();
        //return $producto;
        return view('AdmInterfaces.IntProductos.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        $producto=Producto::find($code)->firstOrFail();
        $request->validate([
            'code'        => 'required|min:2',
            'nombre'      => 'required|min:4',
            'dist'        => 'required|min:4',
            'publico'     => 'required|min:4',
            'nivel-1'     => 'required',
            'nivel-2'     => 'required',
            'nivel-3'     => 'required'
        ]);
        $producto->nombre=$request->input('nombre');
        $producto->valor_dist=$request->input('dist');
        $producto->precio_publico=$request->input('publico');
        $producto->nivel_1=$request->input('nivel-1');
        $producto->nivel_2=$request->input('nivel-2');
        $producto->nivel_3=$request->input('nivel-3');
        if($request->hasFile('imagen')){
             $file_path = public_path() . "/productoimg/$producto->imagen";
            \File::delete($file_path);
            $file=$request->file('imagen');
            $foto=$producto->nombre.$file->getClientOriginalExtension();
            $image= Image::make($file)->encode('webp',90)->save(public_path('/productoimg/' . $foto.'.webp'));
            $producto->imagen=$foto.'.webp';
        }
        $producto->save();
        alert()->success('LIN LIFE', 'Producto actualizado correctamente');
        return Redirect::to('/productos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $producto=Producto::find($code)->firstOrFail();
        $producto->delete();
        alert()->info('LIN LIFE', 'Producto eliminado');
        return Redirect::to('/productos');
    }
}