<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centroscomerciale extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'longitud',
        'latitud',
    ];
    
    public function puestos() {
        return $this->hasMany(Puesto::class);
    }

}
