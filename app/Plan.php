<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function puestos() {
        return $this->hasMany(Puesto::class);
    }
}
