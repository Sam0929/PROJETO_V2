<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;
use App\Models\User;

class Cursos extends Model
{
    protected $fillable = ['Nome','Tipo','Resumo','Descrição','Max','Min','Status'];

    protected $table = 'cursos';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
