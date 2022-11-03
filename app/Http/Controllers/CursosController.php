<?php

namespace App\Http\Controllers;
use App\Models\Cursos;
use Redirect;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function index(){
        $Cursos = Cursos::get();

        return view ('cursos.cursos_page',['Curso' => $Cursos]);
        
}
    public function new(){

    return view ('CRUD.create_cursos');

    }

    public function add (Request $request){

        $Cursos = new Cursos;
        $Cursos = $Cursos-> create($request -> all());
        
        return redirect::to('cursos');
    }
    
    public function edit ($id) {
        $Cursos = Cursos::findOrFail($id);

        return view('CRUD.create_cursos',['Cursos' => $Cursos]);
    }
    public function update($id, Request $request){
        
    $Cursos = Cursos::findOrFail ($id);
    $Cursos -> update ($request -> all());
    
    return redirect::to('cursos');
    }


    public function delete($id){
        $Cursos = Cursos::findOrFail ($id);
        $Cursos -> delete();
        return redirect::to('cursos');
    }

}
