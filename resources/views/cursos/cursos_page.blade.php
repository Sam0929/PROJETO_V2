@extends('layouts.main')

@section('title','Professores Matriculados')

@section('content')
<!--Cabeçalho-->
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">Banco de Alunos</span>
      </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link" >Home</a></li>
                <li class="nav-item"><a href="/alunos" class="nav-link" aria-current="page">Tabela de Alunos</a></li>
                <li class="nav-item"><a href="/professores" class="nav-link" aria-current="page">Tabela de Professores</a></li>
                <li class="nav-item"><a href="/cursos" class="nav-link active">Cursos</a></li>
            </ul>
    
    </header>
</div>
<!--Conteúdo-->
<div class='container'>
    <div class='row justify-content-center'>
        <div class='col-md-12'>
            <div class='card'>
            @if (Auth::check() && Auth::user()->admin == 1)
            <div class="card-header"><a class="btn btn-primary" href="{{url('cursos/novo')}}" role="button"> Novo Curso</a> </div>
            @endif
                    <div class='card-body'>
               
                
            
                      <h1 class="text-center">Cursos disponíveis</h1>
                          
                        <table class="table table-striped table-hover table-bordered ">
                            <thead>
                                <tr>
                                  <th scope="col">Id</th>
                                  <th scope="col">Nome</th>
                                  <th scope="col">Tipo</th>
                                  <th scope="col">Resumo</th>
                                  <th scope="col">Descrição</th>
                                  <th scope="col">Max</th>
                                  <th scope="col">Min</th>
                                  <th scope="col">Participantes</th>
                                  <th scope="col">Status</th>
                                  
                                  <th scope="col">Editar</th>
                                  <th scope="col">Deletar</th>
                                  <th scope="col">NomedoAluno</th>
                                  <th scope="col">Matricular</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                              
                              @foreach($Curso as $C)
                                  <tr>
                                    <td class="fw-bold">{{ $C->id }}</td>
                                    <td class="text-break">{{ $C->Nome }}</td>
                                    <td class="text-break">{{ $C->Tipo}}</td>
                                    <td class="text-break">{{ $C->Resumo}}</td>
                                    <td class="text-break">{{ $C->Descrição}}</td>
                                    <td class="text-break">{{ $C->Max}}</td>
                                    <td class="text-break">{{ $C->Min}}</td>
                                    <td class='text-break'>{{ count($C->Users)}}</td>
                                    <td class="text-break">{{ $C->Status}}</td>
                                    <td class="text-center"> <a class="btn btn-primary" href="cursos/{{$C->id}}/edit" role="button">Editar</button></td>
                                    <td class="text-center">
                                          <form action="/cursos/delete/{{ $C->id }}" method="POST">
                                          @csrf
                                          @method('delete')
                                          <button class="btn btn-danger">Deletar</button>
                                          </form>
                                    </td>
                                    <td class="text-break">{{ $C->user->name}}</td>
                                    <form action="/cursos/{{ $C->id }}/join" method="POST">
                                      @csrf
                                    <td class="text-center"> <a class="btn btn-primary" href="cursos/{{$C->id}}/join" onclick="curso.preventDefault();
                                    this.closest('form').submit();">Matricular</td>
                                    </form>
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
                  </div>
            </div>   
        </div>
    </div>
</div>


@endsection