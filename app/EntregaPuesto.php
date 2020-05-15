<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntregaPuesto extends Model
{
    public function puesto(){
        return $this->belongsTo(Puesto::class);
    }
    public function entrega() {
        return $this->belongsTo(Entrega::class);
    }
}
