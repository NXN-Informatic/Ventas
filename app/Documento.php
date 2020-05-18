<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'activo', 
        'puesto_id',
        'tipodocumento_id',
    ];
    
    public function puesto() {
        return $this->belongsTo(Puesto::class);
    }

    public function tipo_documento() {
        return $this->belongsTo(TipoDocumento::class,'tipodocumento_id');
    }
}
