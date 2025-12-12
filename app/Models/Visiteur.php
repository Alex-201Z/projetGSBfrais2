<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Visiteur extends Authenticatable
{
    protected $table = 'visiteur';
    protected $primaryKey = 'id_visiteur';
    public $timestamps = false;

    use HasApiTokens;

    protected $hidden = [
        'pwd_visiteur',
        'remember_token',
    ];
    public function getAuthPassword()
    {
        return $this->pwd_visiteur;
    }

}
