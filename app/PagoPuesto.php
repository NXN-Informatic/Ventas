<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoPuesto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'puesto_id',
        'pago_id',
        'activo'
    ];

    public function puesto(){
        return $this->belongsTo(Puesto::class);
    }

    public function pago() {
        return $this->belongsTo(Pago::class);
    }
}
