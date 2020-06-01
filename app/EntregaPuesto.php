<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntregaPuesto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activo', 
        'entrega_id',
        'puesto_id'
    ];

    public function puesto(){
        return $this->belongsTo(Puesto::class);
    }

    public function entrega() {
        return $this->belongsTo(Entrega::class);
    }
}
