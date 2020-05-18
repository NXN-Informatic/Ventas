<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'icono'
    ];

    public function pago_puestos() {
        return $this->hasMany(PagoPuesto::class);
    }
}
