<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'visitante_id', 
        'producto_id',
        'activo'
    ];

    public function producto() {
        return $this->belongsTo(Producto::class);
    }

    public function visitante() {
        return $this->belongsTo(Visitante::class);
    }
}
