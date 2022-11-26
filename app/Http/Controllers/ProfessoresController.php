<?php

namespace App\Http\Controllers;
use App\Models\Profe;
use App\Models\User;
use App\Models\Cursos;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Http\Request;

class ProfessoresController extends Controller
{
    public function index(){
        $Professores = Profe::get();

        return view ('professores.professores',['Professores' => $Professores]);
        
}
    public function new(){

    return view ('CRUD.create_prof');

    }

    public function add (Request $request){

       $User = new User;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt($request->password);
        $User->profe = true;
        $User->save();
        

        $Profe = new Profe;
        $Profe->Nome = $User->name;
        $Profe->CPF = $request->CPF;
        $Profe->Endereço = $request->Endereço;
        $Profe->user_id = $User->id;
        $Profe->save();
        
        return redirect::to('professores');
    }

    public function delete($id){
        $Professores = Profe::findOrFail ($id);
        $Professores -> delete();
        return redirect::to('professores');
    }

    public function edit ($id) {
        $Professores = Profe::findOrFail($id);

        return view('CRUD.create_prof',['Profe' => $Professores]);
}
    public function update($id, Request $request){
        
    $Professores = Profe::findOrFail ($id);
    $Professores -> update ($request -> all());
    
    return redirect::to('professores');
}
    public function cursos($id){
        $Professores = Profe::findOrFail($id);
        $Cursos = $Professores->cursos;
        return view('professores.cursos',['Cursos' => $Cursos]);
    }
    

}