@extends('layouts.main')

@section('title','Informações pessoais')

@section('content')

<div class='container'>
    <div class='row justify-content-center'>
        <div class='col-md-12'>

<div class="card">
  <div class="card-body">
    <p>Suas informações pessoais:</p>

    <p>Nome: {{ Auth::user()->name }}</p>
    <p>Email: {{ Auth::user()->email }}</p>
    @if (Auth::user()->admin == 1)
    <p>Administrador: Sim</p>
    @endif
    @if (Auth::user()->admin == 0 && Auth::user()->profe == 0)
    <p> CPF: {{ Auth::user()->Aluno->CPF}}</p>
    <p>Filme: {{ Auth::user()->Aluno->Filme}}</p>
    <p>Endereço: {{ Auth::user()->Aluno->Endereço}}</p>
    <a class="btn btn-primary" href="alunos/{{Auth::user()->Aluno->id}}/edit" role="button">Editar</a>
    <a class="btn btn-primary" href="cursos/aluno" role="button">Meus Cursos</a>
    @else
    
    <a class="btn btn-primary" href="cursos/profe" role="button">Meus Cursos</a>
    @endif
    
  </div>
</div>

</div>
    </div>
    </div>















@endsection