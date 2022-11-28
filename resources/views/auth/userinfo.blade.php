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
         @if (Auth::check() && Auth::user()->admin == 1)   
             <li class="nav-item"><a href="/alunos" class="nav-link">Tabela de Alunos</a></li>
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
            <div class='card-header'>
                    <a class="btn btn-primary" href="/" role="button">Voltar para página inicial</a>  
                </div>
            @if (\Session::has('danger'))
              <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
              </svg>
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                  <div>{!! \Session::get('danger') !!}</div>
                  </div>
              @endif
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
                    <div class = "position-absolute bottom-10">
                    <a class="btn btn-primary" href="alunos/{{Auth::user()->Aluno->id}}/edit" role="button">Editar</a>
                    </div>
                    <div class="text-end">
                    <a class="btn btn-primary " href="cursos/aluno" role="button">Meus Cursos</a>
                    </div>
                  @else
                  @if (Auth::user()->profe == 1)
                  
                    <p>Professor: Sim</p>
                    <p>CPF: {{ Auth::user()->Profe->CPF}}</p>
                    <p>Endereço: {{ Auth::user()->Profe->Endereço}}</p>
                  <div class = "position-absolute bottom-10">
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