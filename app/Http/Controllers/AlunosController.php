<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\User;
use Redirect;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Json;
class AlunosController extends Controller

{
    public function index01(){

        return view ('welcome');
    }
    
    public function index(){
        $Alunos = Aluno::get();
        $User = User::get();
        

        return view ('alunos.alunos',['Alunos' => $Alunos],['User' => $User]);
        
    }

    public function new (){
        
        $movies = array();
            
            for($j=1; $j<7; $j++){

            $api = Http::withoutVerifying()->get('https://www.learn-laravel.cf/movies?page='. $j);
            $auxjson = json_decode($api, true);
            $api = $auxjson['data'];

            foreach ($api as $movie){
                for($i=0 ; $i<6; $i++) {
                    if($movie['category_id'] == $i+1){
                        
                        $movies[] = array('nome' => $movie['name']);
                }
            }
        };
    }
        return view ('CRUD.create',['movies' => $movies]);
}

    public function add (Request $request){

        
        $data = $request->all();
        $data['password'] = \Hash::make($data['password']); // ou bcrypt($data['senha']);
        $User = User::create($data);

        $Aluno = new Aluno;
        $Aluno->Nome = $User->name;
        $Aluno->CPF = $request->CPF;
        $Aluno->Endereço = $request->Endereço;
        $Aluno->Filme = $request->Filme;
        $Aluno->user_id = $User->id;
        $Aluno->save();
    
        

        
       

     
        
        
        
        return redirect::to('alunos');
    }
    
    public function edit ($id) {
        $Aluno = Aluno::findOrFail($id);
        $movies = array();

        for($j=1; $j<7; $j++) {

            $api = Http::get('https://www.learn-laravel.cf/movies?page=' . $j);
            $auxjson = json_decode($api, true);
            $api = $auxjson['data'];

            foreach ($api as $movie){
                for($i=0 ; $i<6; $i++){
                    if($movie['category_id'] == $i+1){
                        
                        $movies[] = array('nome' => $movie['name']);
                }
            }
        };
    }
        
        return view('CRUD.create', ['Aluno' => $Aluno, 'movies' => $movies]);
}
    
    public function update($id, Request $request){
        
        $Aluno = Aluno::findOrFail ($id);
        $Aluno -> update ($request -> all());
        
        return redirect::to('alunos');


    }
    
    public function delete($id){
        $Aluno = Aluno::findOrFail ($id);
        $Aluno -> delete();
        return redirect::to('alunos');
    }


}