<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $fillable = [
        'name', 'id', 'maxsubcategorias', 'precio_min', 'description', 'phone', 'phone2'
    ];
    public function puestosubcatergorias() {
        return $this->HasMany(PuestoSubcategoria::class);
    }
    public function entrega_puestos() {
        return $this->hasMany(EntregaPuesto::class);
    }
    public function pago_puestos() {
        return $this->hasMany(PagoPuesto::class);
    }
    public function horarios() {
        return $this->hasMany(Horario::class);
    }   
    public function plan() {
        return $this->belongsTo(Plan::class);
    }
    public function documentos() {
        return $this->hasMany(Documento::class);
    } 
    public function usuario_puestos() {
        return $this->hasMany(UsuarioPuesto::class);
    }
}
