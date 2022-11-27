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
        $User = User::findOrFail($Professores->user_id);
        $User->delete();
        $Professores -> delete();
        return redirect::to('professores');
    }

    public function edit ($id) {
        $Profe = Profe::findOrFail($id);
        $User = User::findOrFail($Profe->user_id);
        
        return view('CRUD.create_prof',['Profe' => $Profe, 'User' => $User]);
}
    public function update($id, Request $request){
        
        $Profe = Profe::findOrFail ($id);
        
        $User = User::findOrFail($Profe->user_id);
        $data = $request->all();
        $data['password'] = \Hash::make($data['password']);
        $User -> update ($data);
        
        
        $Profe -> Nome = $User -> name;
        $Profe -> update ($request->all());

    
    if (Auth::check() && Auth::user()->admin == 1){
        return redirect::to('professores');}
        else{
        return redirect::to('userinfo');}
}
    public function cursos($id){
        $Professores = Profe::findOrFail($id);
        $Cursos = $Professores->cursos;
        return view('professores.cursos',['Cursos' => $Cursos]);
    }
    

}