<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $fillable = [
        'descripcion'
    ];
    public function documentos() {
        return $this->hasMany(Documento::class,'tipodocumento_id');
    }
}
