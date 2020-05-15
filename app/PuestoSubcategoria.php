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
        //era necesario definir el nombre del id?? creo q no
    }
    public function puesto() {
        return $this->belongsTo(Puesto::class); //comprobando el comentario anterior xD
    }

    public function grupos() {
        return $this->hasMany(Grupo::class, 'puestosubcategoria_id');
    }
}
