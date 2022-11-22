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

    return view ('CRUD.create_prof');

    }

    public function add (Request $request){

        $Professores = new Profe;
        $Professores = $Professores-> create($request -> all());
        
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
public function uploadAvatar(Request $request){
    if($request->hasFile('image')){
        $filename = $request->image->getClientOriginalName();
    $request->image->storeAs('images', $filename, 'public');
    auth()->Profe()->update(['avatar => $filename']);
    }
    return redirect()->back()
}

}