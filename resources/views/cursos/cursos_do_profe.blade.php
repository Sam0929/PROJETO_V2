@extends('layouts.main')

@section('title','Cursos Ministrados')

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
             <li class="nav-item"><a href="/professores" class="nav-link active">Tabela de Professores</a></li>
         @endif
             <li class="nav-item"><a href="/cursos" class="nav-link">Cursos</a></li>
         </ul>
     
    </header>
</div>
<!--Conteúdo-->
<div class='container'>
    <div class='row justify-content-center'>
        <div class='col-md-12'>
            <div class='card'>
                <div class='card-body'>
                    <h1 class="text-center fs-2">Cursos que você ministra</h1>
                        <table class="table table-striped table-hover table-bordered ">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Resumo</th>
                                
                        </tr>
                        </thead>
                        @foreach($cursos as $C)
                        
                            <tbody>
                                <tr>
                                    <td class="text-break">{{ $C->Nome }}</td>
                                    <td class="text-break">{{ $C->Tipo}}</td>
                                    <td class="text-break">{{ $C->Resumo}}</td>
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