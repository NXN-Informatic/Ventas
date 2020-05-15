<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    public function favoritos(){
        return $this->hasMany(Favoritos::class);
    }
}
