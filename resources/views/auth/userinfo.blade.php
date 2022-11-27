@extends('layouts.main')

@section('title','Informações pessoais')

@section('content')

<!--Cabeçalho-->
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">Banco de Alunos</span>
      </a>

      <ul class="nav nav-pills">
             
             <li class="nav-item"><a href="/" class="nav-link" aria-current="page">Dashboard</a></li>
         @if (Auth::check() && Auth::user()->admin == 1 or Auth::user()->profe == 1)   
             <li class="nav-item"><a href="alunos" class="nav-link">Tabela de Alunos</a></li>
             <li class="nav-item"><a href="/professores" class="nav-link">Tabela de Professores</a></li>
         @endif
             <li class="nav-item"><a href="/cursos" class="nav-link">Cursos</a></li>
         </ul>
     
    </header>
</div>

<!--Conteúdo-->
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
                    <a class="btn btn-primary " href="cursos/aluno" role="button">Meus Cursos</a>
                  @endif
                  
                  @if (Auth::user()->admin == 0 && Auth::user()->profe == 0)
                    <p> CPF: {{ Auth::user()->Aluno->CPF}}</p>
                    <p>Filme: {{ Auth::user()->Aluno->Filme}}</p>
                    <p>Endereço: {{ Auth::user()->Aluno->Endereço}}</p>
                    <a class="btn btn-primary" href="alunos/{{Auth::user()->Aluno->id}}/edit" role="button">Editar</a>
                    <a class="btn btn-primary " href="cursos/aluno" role="button">Meus Cursos</a>
                  @else
                  @if (Auth::user()->profe == 1)
                  
                    <p>Professor: Sim</p>
                  <div class = " position-absolute bottom-10">
                    <a class="btn btn-primary" href="professores/{{Auth::user()->Profe->id}}/edit" role="button">Editar</a>
                  </div>
                  <div class="text-end">
                    <a class="btn btn-primary" href="cursos/profe" role="button">Meus Cursos</a>
                  </div>
                  @endif
                  @endif

              </div>
            </div>
          </div>
        </div>
</div>
















@endsection