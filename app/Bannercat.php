<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bannercat extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categoria_id' ,
        'name',
        'imagen'
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }
    
}
