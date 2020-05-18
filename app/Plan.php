<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'costos',
        'activo'
    ];

    public function puestos() {
        return $this->hasMany(Puesto::class);
    }
}
