<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    public function puesto() {
        return $this->belongsTo(Puesto::class);
    }
}
