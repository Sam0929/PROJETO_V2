<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cursos;
use App\Models\User;

class Aluno extends Model

{
    protected $fillable = ['CPF','Endereço','Filme'];

    public function user()
    {
        return $this->HasOne(User::class);
    }

    
    
}

