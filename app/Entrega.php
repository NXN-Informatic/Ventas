<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    public function entrega_puestos() {
        return $this->hasMany(EntregaPuesto::class);
    }
}
