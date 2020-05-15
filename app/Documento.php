<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [
        'tipodocumento_id', 'puesto_id', 'titulo', 'descripcion', 'imagen'
    ];
    public function puesto() {
        return $this->belongsTo(Puesto::class);
    }
    public function tipo_documento() {
        return $this->belongsTo(TipoDocumento::class,'tipodocumento_id');
    }
}
