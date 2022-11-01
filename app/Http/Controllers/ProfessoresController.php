<?php

namespace App\Http\Controllers;
use App\Models\Profe;
use Redirect;
use Illuminate\Http\Request;

class ProfessoresController extends Controller
{
    public function index(){
        $Professores = Profe::get();

        return view ('professores.professores',['Professores' => $Professores]);
        
}
    public function new(){

    return view ('CRUD.create');

    }

    public function add (Request $request){

        $Professores = new Profe;
        $Professores = $Professores-> create($request -> all());
        
        return redirect::to('professores');
    }



}