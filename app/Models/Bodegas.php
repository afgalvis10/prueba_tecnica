<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodegas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'id_responsable',
        'estado',
        'created_by',
        'updated_by',
    ];

    public function historiales()
    {
        return $this->hasMany(Historiales::class);
    }

    public function user()
    {
        return $this->belongsTo(Usuarios::class, 'id_responsable');
    }

    public function inventario()
    {
        return $this->belongsToMany(Inventarios::class);
    }

    public function historial()
    {
        return $this->belongsToMany(Historiales::class);
    }
}
