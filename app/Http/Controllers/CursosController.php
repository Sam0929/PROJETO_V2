<?php

namespace App\Http\Controllers;
use App\Models\Cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function index(){
        $Cursos = Cursos::get();

        return view ('cursos.cursos',['Curso' => $Cursos]);
        
}
}
