@extends('layouts.main')

@section('title','Todos os cursos')

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
             <li class="nav-item"><a href="/cursos" class="nav-link active">Cursos</a></li>
         </ul>
     
    </header>
</div>
<!--Conteúdo-->

<div class='container'>
    <div class='row justify-content-center'>
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
        <div class='col-md-12'>
            <div class='card'>
            @if (Auth::check() && Auth::user()->admin == 1)
            <div class="card-header"><a class="btn btn-primary" href="{{url('cursos/novo')}}" role="button"> Novo Curso</a> </div>

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
                                  <th scope="col">Info</th>
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
                                    @if (count($C->Users) == ($C->Max))
                                    <td class="text-break">Matrículas Encerradas</td>
                                    @else
                                    @if (count($C->Users) >= ($C->Min))
                                    <td class="text-break">Matrículas Abertas - Curso acontecerá!</td>
                                    @else
                                    <td class="text-break">Matrículas Abertas - Mínimo de alunos não atingido!</td>
                                    @endif
                                    @endif
                                    <td class="text-center"> <a class="btn btn-primary" href="cursos/{{$C->id}}/edit" role="button">Editar</button></td>
                                    <td class="text-center">
                                          <form action="/cursos/delete/{{ $C->id }}" method="POST">
                                          @csrf
                                          @method('delete')
                                          <button class="btn btn-danger">Deletar</button>
                                          </form>
                                    </td>
                                    <td class="text-center"><a class="btn btn-primary" href="cursos/info/{{$C->id}}">Mais_inf</button></td>
                    
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
                        </div>
                </div>
                  </div>
                                @else
                                  <div id="cards-container" class="row">
                                      @foreach($Curso as $C)
                                      <div class="card col-md-3">
                                        <img src="/img/imagemcursos.jpg" alt="{{ $C->Tipo}}">
                                          <div class="card-body">
                                            <h5 class="card-title">{{ $C->Nome }}</h5>
                                            
                                            <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Resumo: {{ $C->Resumo}}.</li>
                                        
                                            </ul>
                                          
                                          @if (Auth::check() && Auth::user()->profe == 1)
                                            
                                              <form action="/professores/{{ $C->id }}/add" method="POST">
                                                @csrf
                                                <div class='text-center position-relative'>
                                                <a class="text-center position-relative btn btn-primary" href="/professores/{{ $C->id }}/add" onclick="curso.preventDefault();
                                                  this.closest('form').submit();">Ministrar</a>
                                              </form>
                                                </div>
                                            </div>
                                              </div>
                                            
                                          @else
                                       
                                
                                  
                                     
                                        
                                      </div>
                                         <div class='text-center position-relative'>
                                        <a class="btn btn-primary" href="cursos/info/{{$C->id}}">Saber mais</button></a>
                                        </div>
                                        
                                        </div>
                                        @endif
                                      
                                      @endforeach
                       
                                    @endif
                                    
                        



@endsection