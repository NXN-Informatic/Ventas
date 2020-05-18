<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'description'
    ];

    public function entrega_puestos() {
        return $this->hasMany(EntregaPuesto::class);
    }
}
