<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sur_name',
        'ndocumento',
        'address',
        'imagen',        
        'email',
        'role',
        'status',
        'maxpuestos',
        'latitud',
        'longitud',
        'useragent',
        'completado',
        'distrito_id',
        'identidad_id',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function usuario_puestos() {
        return $this->hasMany(UsuarioPuesto::class,'usuario_id');
    }

    public function identidad(){
        return $this->belongsTo(Identidad::class);
    }

    public function user_social_accounts() {
        return $this->hasMany(UserSocialAccount::class,'user_id');
    }

    public function distrito(){
        return $this->belongsTo(Distrito::class);
    }
}
