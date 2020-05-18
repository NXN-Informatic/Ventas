<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'descripcion',
        'puestosubcategoria_id',
        'activo'
    ];

    public function puestosubcategoria() {
        return $this->belongsTo(PuestoSubcategoria::class);
    }

    public function productos() {
        return $this->hasMany(Producto::class);
    }
}
