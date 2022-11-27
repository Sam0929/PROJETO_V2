<?php

namespace App\Http\Controllers;
use App\Models\Cursos;
use App\Models\User;
use App\Models\Profe;
use Illuminate\Support\Facades\Auth;
use Professores;
use Redirect;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function index(){
        $Cursos = Cursos::get();
        return view ('cursos.cursos_page',['Curso' => $Cursos]);      
}
    public function CursosInfo($id){
       
        $Curso = Cursos::findOrFail($id);
        $Profe = $Curso -> profes -> first();
        $hasUserJoined = false;
        $user = auth()->user();
        if($user) {

            $userCursos = $user->CursosAsParticipant->toArray();

            foreach($userCursos as $userCurso) {
                if($userCurso['id'] == $id) {
                    $hasUserJoined = true;
                }
            }

        }

        return view ('cursos.cursos_info',['Curso' => $Curso, 'hasUserJoined' => $hasUserJoined, 'Profe'=> $Profe]);}
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


        return redirect()->back()->with('success', 'Você se inscreveu no curso de '.$curso->Nome);   

    }

    public function addCurso($id, request $request){
        $profe = auth()->user()->profe()->first();
        $profe->CursosAsProfe()->attach($id);
        $curso = Cursos::findOrFail($id);

        return redirect()->back()->with('success', 'Você se tornou professor do curso de '.$curso->Nome .'!');

    }

    public function CursosDoAluno(){
        $user = auth()->user();
        $Cursos = $user->CursosAsParticipant()->get();

        return view('cursos.cursos_do_aluno', ['cursos' => $Cursos]);
    }
    public function CursosDoProfe(){
        $profe = auth()->user()->profe()->first();
        $Cursos = $profe->CursosAsProfe()->get();

        return view('cursos.cursos_do_profe', ['cursos' => $Cursos]);
    }
    public function LeaveCurso($id){
        $user = auth()->user();
        $user->CursosAsParticipant()->detach($id);

        $curso = Cursos::findOrFail($id);

        return redirect()->back()->with('success', 'Você saiu do curso de '.$curso->Nome);   
    }

}
