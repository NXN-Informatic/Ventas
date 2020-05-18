<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre'
    ];

    public function regions(){
        return $this->hasMany(Region::class);
    }
}
