<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profe extends Model
{
    
protected $fillable = ['Nome','CPF','Endereço','Usuário','Senha'];


protected $table = 'Profe';
        
}
