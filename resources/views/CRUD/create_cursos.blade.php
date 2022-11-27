@extends('layouts.main')

@section('title','Cadastro de Novos Cursos')

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
        <div class='col-md-8'>
            <div class='card'>
                <div class='card-header'>
                    <a class="btn btn-primary" href="{{url('cursos')}}" role="button">Voltar</a>  
                </div>
                    <div class='card-body'>
                    
                                            @if (Request::is('*/edit'))
                                            <form action= "{{ url('/cursos/update')}}/{{ $Cursos->id }}" method="POST">
                        @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                    <input type="text" name="Nome" class="form-control"  placeholder="Nome.." value ="{{ $Cursos-> Nome}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tipo</label>
                                    <input type="text" name="Tipo" class="form-control"  placeholder="Tipo.." value ="{{ $Cursos-> Tipo}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Resumo</label>
                                    <input type="text" name="Resumo" class="form-control"  placeholder="Resumo.." value ="{{ $Cursos-> Resumo}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                                    <input type="text" name="Descrição" class="form-control"  placeholder="Descrição.." value = "{{ $Cursos-> Descrição}}">                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Max</label>
                                    <input type="text" name="Max" class="form-control"  placeholder="Max.." value = "{{ $Cursos-> Max}}">                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Min</label>
                                    <input type="text" name="Min" class="form-control"  placeholder="Min.." value = "{{ $Cursos-> Min}}">                    
                                </div>
                               
                                
                                 <button type='submit' class='btn btn-primary text-center'>Atualizar</button>
                            </form>
                        @else
                                                <form action= "{{ url('cursos/add')}}" method="POST">
                                            @csrf
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                                    <input type="text" name="Nome" class="form-control"  placeholder="Nome..">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Tipo</label>
                                                    <input type="text" name="Tipo" class="form-control"  placeholder="Tipo..">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Resumo</label>
                                                    <input type="text" name="Resumo" class="form-control"  placeholder="Resumo..">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                                                    <input type="text" name="Descrição" class="form-control"  placeholder="Descrição..">               
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Max</label>
                                                    <input type="text" name="Max" class="form-control"  placeholder="Max..">               
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Min</label>
                                                    <input type="text" name="Min" class="form-control"  placeholder="Min..">                    
                                                </div>
                                                    <button type='submit' class='btn btn-primary'>Salvar</button>
                                                </form>
                                @endif



                        </div>
            </div>
        </div>
    </div>
</div>

    

@endsection