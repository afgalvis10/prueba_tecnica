<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historiales extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_bodega_origen',
        'id_bodega_destino',
        'id_inventario',
        'created_by',
        'updated_by',
    ];

    public function bodega_origen()
    {
        return $this->belongsToMany(Bodegas::class, 'id_bodega_origen');
    }

    public function bodega_destino()
    {
        return $this->belongsToMany(Bodegas::class, 'id_bodega_destino');
    }

    public function inventario()
    {
        return $this->belongsToMany(Inventarios::class, 'id_inventario');
    }
}
