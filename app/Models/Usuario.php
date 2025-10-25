<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id';  

    // Apenas os campos que você realmente usa
    protected $fillable = ['nome', 'senha', 'foto']; // Removi email se não usa

    protected $hidden = [
        'senha',
    ];

    // Se estiver usando texto puro, COMENTE este método:
    // public function getAuthPassword()
    // {
    //     return $this->senha;
    // }
}