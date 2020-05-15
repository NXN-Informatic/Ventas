<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $fillable = [
        'nombre', 'provincia_id'
    ];

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
