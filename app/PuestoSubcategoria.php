<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuestoSubcategoria extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'puesto_id',
        'subcategoria_id',
        'activo'
    ];

    public function subcategoria() {
        return $this->belongsTo(Subcategoria::class, 'subcategoria_id'); 
    }

    public function puesto() {
        return $this->belongsTo(Puesto::class);
    }

    public function grupos() {
        return $this->hasMany(Grupo::class, 'puestosubcategoria_id');
    }
}
