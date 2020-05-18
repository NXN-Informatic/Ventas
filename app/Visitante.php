<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip',
        'sessionid',
        'latitud',
        'longitud',
        'useragent'
    ];

    public function favoritos(){
        return $this->hasMany(Favoritos::class);
    }
}
