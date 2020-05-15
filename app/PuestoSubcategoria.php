<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuestoSubcategoria extends Model
{
    protected $fillable = [
        'puesto_id', 'subcategoria_id'
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
