<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'region_id'
    ];

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function distritos(){
        return $this->hasMany(Distrito::class);
    }
}
