<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    public function pago_puestos() {
        return $this->hasMany(PagoPuesto::class);
    }
}
