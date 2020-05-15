<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    public function producto() {
        return $this->belongsTo(Producto::class);
    }
    public function visitante() {
        return $this->belongsTo(Visitante::class);
    }
}
