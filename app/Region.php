<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'pais_id'
    ];

    public function pais(){
        return $this->belongsTo(Pais::class);
    }

    public function provincias(){
        return $this->hasMany(Provincia::class);
    }
}
