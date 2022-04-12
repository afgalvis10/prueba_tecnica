<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'created_by',
        'updated_by',
    ];

    public function inventario(){
        return $this->hasMany(Inventarios::class)->where('inventario.id_producto', $this->id);
    }
}
