<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'descripcion',
        'icono'
    ];

    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }
    Public function bannercats()
    {
        return $this->hasMany(Bannercat::class);
    }
    
}
