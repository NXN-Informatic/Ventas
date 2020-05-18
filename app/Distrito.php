<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 
        'provincia_id'
    ];

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
