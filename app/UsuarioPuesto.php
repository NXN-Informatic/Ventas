<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioPuesto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id',
        'puesto_id', 'id'
    ];

    public function puesto(){
        return $this->belongsTo(Puesto::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'usuario_id');
    }
}
