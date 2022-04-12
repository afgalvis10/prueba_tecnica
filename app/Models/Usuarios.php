<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'foto',
        'estado',
        'created_by',
        'updated_by',
    ];

    public function bodega(){
        return $this->hasMany(Bodegas::class);
    }
}
