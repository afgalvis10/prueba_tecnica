<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_producto',
        'id_bodega',
        'cantidad',
        'created_by',
        'updated_by',
    ];

    public function producto(){
        return $this->belongsTo(Productos::class, 'id_producto');
    }

    public function bodega(){
        return $this->belongsToMany(Bodegas::class, 'id_bodega');
    }

    public function historial(){
        return $this->belongsToMany(Historiales::class);
    }
}
