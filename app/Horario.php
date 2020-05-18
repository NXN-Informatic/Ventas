<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day',
        'activo',
        'time_ini',
        'time_fin',
        'puesto_id '
    ];

    public function puesto() {
        return $this->belongsTo(Puesto::class);
    }
}
