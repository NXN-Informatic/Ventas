<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'codigo',
        'description',
        'precio',
        'grupo_id',
        'stock',
        'activo'
    ];

    public function imagen_productos() {
        return $this->hasMany(ImagenProducto::class);
    }

    public function grupo() {
        return $this->belongsTo(Grupo::class);
    }

    public function favoritos() {
        return $this->hasMany(Favorito::class);
    }
}
