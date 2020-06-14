<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centroscomerciale extends Model
{
    public $timestamps = false;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'longitud',
        'latitud',
        'decripcion',
    ];
    
    public function puestos() {
        return $this->hasMany(Puesto::class);
    }

}
