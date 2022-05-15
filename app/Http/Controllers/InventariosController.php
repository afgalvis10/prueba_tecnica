<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventarios;
use App\Models\Historiales;

class InventariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $producto = Inventarios::where('id_producto', $request->id_producto)->exists();
        $bodega = Inventarios::where('id_bodega', $request->id_bodega)->exists();

        if (!$producto && !$bodega) {
            $inventario = Inventarios::where('id_producto', $request->id_producto)->where('id_bodega', $request->id_bodega)->first();
            $inventario->cantidad = $inventario->cantidad + $request->cantidad;
            $inventario->updated_by = $request->updated_by;
            $inventario->save();
            return response()->json([
                'inventario' => $inventario,
            ]);
        } else {
            $inventario = new Inventarios();
            $inventario->id_producto = $request->id_producto;
            $inventario->id_bodega = $request->id_bodega;
            $inventario->cantidad = $request->cantidad;
            $inventario->created_by = $request->created_by;
            $inventario->updated_by = $request->updated_by;
            $inventario->save();
            return response()->json([
                'inventario' => $inventario,
            ]);
        }
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
    public function update(Request $request, $id_bodega_origen, $id_bodega_destino, $id_producto)
    {
        $inventario_origen = Inventarios::where('id_producto', $id_producto)->where('id_bodega', $id_bodega_origen)->first();
        $inventario_destino = Inventarios::where('id_producto', $id_producto)->where('id_bodega', $id_bodega_destino)->first();
        if (is_null($inventario_origen)) {
            return response()->json(['error' => 'La bodega de origen no existe']);
        } elseif ($inventario_origen->cantidad >= $request->cantidad && $request->cantidad > 0 && $inventario_destino !== null) {
            $inventario_origen->cantidad = $inventario_origen->cantidad - $request->cantidad;
            $inventario_origen->save();
        } else {
            return response()->json(['error' => 'No hay suficiente cantidad en la bodega de origen ó la bodega de destino no existe']);
        }
        if ($inventario_origen->save()) {
            $inventario_destino = Inventarios::where('id_producto', $id_producto)->where('id_bodega', $id_bodega_destino)->first();
            $inventario_destino->cantidad = $inventario_destino->cantidad + $request->cantidad;
            $inventario_destino->save();
            if ($inventario_destino->save()) {
                $historial = new Historiales();
                $historial->id_inventario = $inventario_destino->id;
                $historial->id_bodega_origen = (int)$id_bodega_origen;
                $historial->id_bodega_destino = (int)$id_bodega_destino;
                $historial->cantidad = $request->cantidad;
                $historial->save();
            }
            return response()->json(['success' => 'Producto movido correctamente']);
        }
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
