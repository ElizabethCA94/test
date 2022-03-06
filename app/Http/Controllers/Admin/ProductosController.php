<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        // //retorne una vista 
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productos.almacenar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     // 'nombre' => 'required',
        //     'descripcion' => 'required',
        //     // 'precio' => 'required',
        //     // 'imagen' => 'image|max:1024',
        // ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion= $request->descripcion;
        $producto->precio = $request->precio;
        $producto->estado = $request->estado ? 1 : 0;
        
        if($imagen = $request->file('imagen')){
            $ruta = 'imagen/';
            $imagenProducto = date('YmdHis'). "." .$imagen->getClientOriginalExtension();
            $imagen->move($ruta, $imagenProducto);
            $producto->imagen =  $imagenProducto;
        }

        $producto2 = new Request();

        $producto->save();
        return redirect()-> route('admin.productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('admin.productos.mostrar', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('admin.productos.editar')
            ->with('producto', $producto);
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
        $validated = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'estado' => 'required',
        ]);
        
        $producto = Producto::find($id);

        if($imagen = $request->file('imagen')){
            $ruta = 'imagen/';
            $imagenProducto = date('YmdHis'). "." .$imagen->getClientOriginalExtension();
            $imagen->move($ruta, $imagenProducto);
        }
        else{
            unset($producto->imagen);
        }

        $producto->nombre = $request->nombre;
        $producto->descripcion= $request->descripcion;
        $producto->precio = $request->precio;
        $producto->estado = $request->estado;
        $producto->imagen = $imagenProducto;
        $producto->save();

        return redirect()-> route('admin.productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()-> route('admin.productos.index');
    }
}
