<?php

namespace App\Http\Controllers;
use App\Models\Cursos;
use App\Models\User;
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
        $Cursos->Nome = $request->Nome;
        $Cursos->Tipo = $request->Tipo;
        $Cursos->Resumo = $request->Resumo;
        $Cursos->Descrição = $request->Descrição;
        $Cursos->Max = $request->Max;
        $Cursos->Min = $request->Min;
        $Cursos->Status = $request->Status;
        $User = auth()->user();
        $Cursos->user_id = $User->id;
        $Cursos->save();
        
        
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
    public function join($id){
        $user = auth()->user();
        $user->CursosAsParticipant()->attach($id);

        $curso = Cursos::findOrFail($id);

        return redirect::to('cursos')->with('msg', 'Você se inscreveu no curso de '.$curso->Nome);
    }
}
