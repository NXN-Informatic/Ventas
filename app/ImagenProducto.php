<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'producto_id' ,
        'imagen'
    ];

    public function producto() {
        return $this->belongsTo(Producto::class);
    }
    
}
