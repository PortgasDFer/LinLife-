<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use App\Producto;
use App\Ventas;
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
        $productos=Producto::where('baja','=',1);
        return DataTables::of($productos)
                ->addColumn('edit','AdmInterfaces.IntProductos.botones.edit')
                ->addColumn('delete','AdmInterfaces.IntProductos.botones.delete')
                ->rawColumns(['edit','delete'])
                ->toJson();  
    }
     public function existenciasTable()
    {           
        $productos=Producto::where('baja','=',1)->orderBy('cantidad','DESC')->get();
        return DataTables::of($productos)
                ->addColumn('promos','AdmInterfaces.IntProductos.botones.promos')
                ->addColumn('ingreso','AdmInterfaces.IntProductos.botones.ingreso')
                ->rawColumns(['promos','ingreso'])
                ->toJson();  
    }


    /**
     * Display a listing of the resource.
     *
     * @return list of resource
     */
    public function index()
    {
        $productos=Producto::all()->count();
        return view('AdmInterfaces.IntProductos.index',compact('productos'));
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
            'imagen'      => 'required|image',
            'existencia'  => 'required|numeric'
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
        $producto->cantidad=$request->input('existencia');
        $producto->slug=Str::slug($producto->nombre);
        $producto->baja=1;
        $producto->save();
        alert()->success('LIN LIFE', 'Producto registrado correctamente');
        return Redirect::to('/productos');


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        $producto=Producto::find($code);
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
        $producto=Producto::find($code);
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
        $producto->slug=Str::slug($producto->nombre);
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
        $producto=Producto::find($code);
        $producto->baja=0;
        $producto->save();
        alert()->info('LIN LIFE', 'Producto eliminado');
        return Redirect::to('/productos');
    }

    public function ingreso()
    {
        $fechaactual=now()->toDateString();
        $productos=Producto::where('baja','=',1)->get();
        return view('AdmInterfaces.IntInventario.entrada', compact('productos','fechaactual'));
    }

    public function existencias()
    {
        return view('AdmInterfaces.IntInventario.existencias');
    }

    public function obtenerDatos($code)
    {
        $producto=Producto::where('code','=',$code)->firstOrFail();
        return Response::json($producto);
    }
    
    public function entradaMercancia(Request $request)
    {       
        $validate = $request->validate([
            'code'        => 'required',
            'ingresa'      => 'required|numeric',
        ]);

        $producto=Producto::find($request->input('code'));
        $cantidad_nueva=$request->input('ingresa');
        $producto->cantidad=$producto->cantidad+$cantidad_nueva;
        $producto->precio_publico=$request->input('precio_nuevo');
        $producto->valor_dist=$request->input('valor_distn');
        $producto->save();
        alert()->info('LIN LIFE', 'Producto ingresado');
        return Redirect::to('/existencias');
    }
}
