<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'puestosubcategoria_id', 'name', 'descripcion'
    ];

    public function puestosubcategoria() {
        return $this->belongsTo(PuestoSubcategoria::class);
    }
    public function productos() {
        return $this->hasMany(Producto::class);
    }
    
}
