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
                <li class="nav-item"><a href="/professores" class="nav-link active" aria-current="page">Tabela de Professores</a></li>
            </ul>
    
    </header>
</div>
<!--Conteúdo-->
<div class='container'>
    <div class='row justify-content-center'>
        <div class='col-md-12'>
            <div class='card'>
                <div class="card-header"><a class="btn btn-primary" href="{{url('professores/novo')}}" role="button"> Novo Professor</a> </div>
                    <div class='card-body'>
               
                
            
                      <h1 class="text-center">Tabela de Professores</h1>
                          
                        <table class="table table-striped table-hover table-bordered ">
                            <thead>
                                <tr>
                                  <th scope="col">Id</th>
                                  <th scope="col">Nome</th>
                                  <th scope="col">CPF</th>
                                  <th scope="col">Endereço</th>
                                  <th scope="col">Usuário</th>
                                  <th scope="col">Senha</th>
                                  <th scope="col">Editar</th>
                                  <th scope="col">Deletar</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                              
                              @foreach($Professores as $P)
                                  <tr>
                                    <td class="fw-bold">{{ $P->id }}</td>
                                    <td class="text-break">{{ $P->Nome }}</td>
                                    <td class="text-break">{{ $P->CPF}}</td>
                                    <td class="text-break">{{ $P->Endereço}}</td>
                                    <td class="text-break">{{ $P->Usuário}}</td>
                                    <td class="text-break">{{ $P->Senha}}</td>
                                    <td class="text-center"> <a class="btn btn-primary" href="Professores/{{$P->id}}/edit" role="button">Editar</button></td>
                                    <td class="text-center">
                                          <form action="Professores/delete/{{ $P->id }}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button class="btn btn-danger">Deletar</button>
                                          </form>
                                    </td>
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