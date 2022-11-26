<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cursos;

class Profe extends Model
{
    
protected $fillable = ['Nome','CPF','Endereço','Usuário','Senha'];


protected $table = 'profe';

public function user() {

    return $this->HasOne(User::class);
}

 
public function CursosAsProfe() {

    return $this->belongsToMany(Cursos::class);
}

}
