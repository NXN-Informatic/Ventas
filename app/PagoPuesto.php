<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoPuesto extends Model
{
    public function puesto(){
        return $this->belongsTo(Puesto::class);
    }
    public function pago() {
        return $this->belongsTo(Pago::class);
    }
}
