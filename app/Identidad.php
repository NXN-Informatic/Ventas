<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identidad extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'identidads';

    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
