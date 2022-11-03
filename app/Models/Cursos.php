<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $fillable = ['Nome','Tipo','Resumo','Descrição','Max','Min','Status'];

    protected $table = 'cursos';


}
