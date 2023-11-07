<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vacante_id',
        'cv'
    ];

    //aqui lo que hacemos es relacionar la tabla candidatos con la tabla de usuario donde decimos que un candidato pertenece a un usuario y nos permitira acceder al usuario

    public function user(){
        return $this->belongsTo(User::class);
    }
}
