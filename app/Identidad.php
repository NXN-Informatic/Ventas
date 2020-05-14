<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identidad extends Model
{
    protected $table = 'identidads';
    protected $fillable = [
        'name'
    ];
}
