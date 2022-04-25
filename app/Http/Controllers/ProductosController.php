<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Inventarios;
use App\Models\Bodegas;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::all();
        $bodega = Bodegas::all();
        foreach ($productos as $producto) {;
            foreach ($bodega as $bodegas) {
                $total = Inventarios::all();
                $producto->total = $total->where('id_producto', $producto->id)->sum('cantidad');
                $productos->sortByDesc('total')->values()->all();
            }
        }
        return response()->json([
            'productos' => $productos,
        ]);
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
        $productos = new Productos($request->all());
        $productos->save();
        if ($productos->save()) {
            $inventario = new Inventarios();
            $inventario->id_producto = $productos->id;
            $inventario->cantidad = 10;
            $inventario->id_bodega = 1;
            $inventario->created_by = $productos->created_by;
            $inventario->updated_by = $productos->updated_by;
            $inventario->save();
        }

        return response()->json([
            'msg' => 'Producto creado correctamente', 
        ]);
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
